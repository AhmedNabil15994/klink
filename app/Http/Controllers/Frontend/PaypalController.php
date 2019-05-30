<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \Paypal\Rest\ApiContext;
use \Paypal\Auth\OAuthTokenCredential;
use \PayPal\Api\Amount;
use \PayPal\Api\Details;
use \PayPal\Api\Item;
use \PayPal\Api\ItemList;
use \PayPal\Api\Payer;
use \PayPal\Api\Payment;
use \PayPal\Api\RedirectUrls;
use \PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

use Crypt;
use Session;
use Carbon;

use App\Models\Frontend\Order;
use App\Models\Frontend\User;
use App\Models\Backend\Role;
use App\Models\Frontend\Senders;
use App\Models\Frontend\Receivers;
use App\Models\Frontend\OrderOtherBilling;
use App\Models\Frontend\Offer;
use App\Models\Backend\Emails;
use App\Models\Frontend\OrderSendReceive;
use App\Models\Frontend\Userroles;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Profile;
use App\Models\Frontend\OrderDates;
use App\Models\Backend\Shipping;
use App\Models\Backend\ShippingCost;
use App\Models\Backend\Admin;
use App\Models\Backend\ShippingDistance;

class PaypalController extends Controller
{
    private $apiContext;
    private $secret;
    private $client_id;

    public function __construct()
    {
        if (config('paypal.settings.mode') == 'live') {
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }
        $this->apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function createUser($email)
    {
        $user = User::where('email', $email)->first();
        $sender = Senders::where('email', $email)->first();

        if (!isset($user)) {
            $newUser = User::create([
                'email' => $email,
                'password' => bcrypt('user123456'),
                'name'=> $sender->first_name.' '.$sender->nick_name

            ]);
            $id = $newUser->id;
            $expireDate = Carbon::today()->addWeeks(1)->toDateString();


            $charset = "0123456789";
            $base = strlen($charset);
            $result = '';

            $now = explode(' ', microtime())[1];
            while ($now >= $base) {
                $i = $now % $base;
                $result = $charset[$i] . $result;
                $now /= $base;
            }
            $code = substr($result, -5);

            $role = Role::where('name', 'user')->first();
            Userroles::create([
                'role_id'=> $role->id,
                'user_id'=> $id
            ]);
            Profile::create([
                'user_id' => $id,
                'first_name' => $sender->first_name,
                'last_name' => $sender->nick_name,
                'company' => $sender->company,
                'phone' => $sender->phone,
                'address' => $sender->street.' '.$sender->home,
                'district' => $sender->town,
                'postal_code' => $sender->postal_code,
                'country' => $sender->country,
                'status' => 'User',
                'user_status_id' => 1,  // active
                'expire_date' => $expireDate,
                'pin' => $code,
            ]);

            Userlinks::create(['user_id' => $id]);
            Userbanks::create(['user_id' => $id]);
        }
    }
    public function sendInvoice($id)
    {
        //$id = $request->id;
        $order_id = Crypt::decrypt($id);
        $sender = Senders::where('order_id', $order_id)->first();
        $email = $sender->email;
        $name = $sender->first_name.' '.$sender->nick_name;
        
        $RegisterEmail = Emails::where('title', '=', 'Invoice')->first();

        $data = [
            'name' => $name,
            'id'=> $id,
            'order_id'=> $order_id,
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);

        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'order_id'    => $id,
            'url'     => url('/order/invoice/download_pdf', $id),
        ];
        \Mail::send(
            'frontend.emails.mail2',
            ['data' => $data],
            function ($message) use ($data) {
                $message
                    ->from($data['no-reply'], $data['name'])
                    ->to($data['email'])->subject($data['subject']);
            }
        );

        return 1;
    }

    public function pay(Request $request)
    {
        $id = $request->order_id;
        $payment_type = $request->payment_type;
        $order = Order::find($id);
        $cost = $order->cost;

        Session::put('payment_type', $payment_type);

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Invoice Nr: '.$id)
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($cost);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $amount = new Amount();
        $amount->setCurrency("EUR")
            ->setTotal($cost);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Invoice Nr: '.$id);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal_success', $id))
                    ->setCancelUrl(route('paypal_cancel'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
            

        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();

        return redirect($approvalUrl);
    }


    public function paypal_success(Request $request, $id)
    {
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            die('Payment Failed');
        }

        $payment_id  = $request->get('paymentId');

        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {
            $order = Order::find($id);
            $order->is_active = 1;
            $order->payment_type = Session::get('payment_type');
            $order->paid = round($order->cost, 2);
            $order->save();
            $encrypt = Crypt::encrypt($id);

            //$this->sendInvoice($encrypt);
            $sender = Senders::where('order_id', $id)->first();
            $email = $sender->email;
            $this->createUser($email);
            $user = User::where('email', $email)->first();
            Session::flash('message', "Success \n Payment Done Successfully \n Invoice was Sent To your Mail");
            return redirect()->route("forceLogin", ['user'=>$user]);
        }

        echo 'Payment Failed';

        die($result);
    }

    public function paypal_cancel(Request $request)
    {
        return 'Payment Cancelled, No Worries !! :)';
    }

    public function sendCode($id)
    {
        //$id = $request->id;
        $order_id = Crypt::decrypt($id);
        $offer = Offer::where('order_id', $order_id)->where('is_accepted', 1)->first();
        $user = $offer->user_id;
        $profile = Profile::where('user_id', $user)->first();
        $name = $profile->first_name.' '.$profile->last_name;
        $RegisterEmail = Emails::where('title', '=', 'ReferenceCode')->first();
        $normal = User::find($user);
        $email = $normal->email;
        $data = [
            'name' => $name,
            'id'=> $id,
            'order_id'=> $order_id,
            
        ];
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base) {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        $code = substr($result, -5);
        $GeneratedEmail = $RegisterEmail->parse($data);

        $order = Order::find($order_id);
        $order->code = $code;
        $order->save();

        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'code'    => $code,
            'order_id'    => $id,
            'url'     => url('/order/reference/download_pdf', $id),
        ];
        \Mail::send(
            'frontend.emails.mail2',
            ['data' => $data],
            function ($message) use ($data) {
                $message
                    ->from($data['no-reply'], $data['name'])
                    ->to($data['email'])->subject($data['subject']);
            }
        );

        return 1;
    }
}
