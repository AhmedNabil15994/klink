<?php

namespace App\Http\Controllers\Frontend\tours;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \PayPal\Api\Amount;

use \PayPal\Api\Item;
use \PayPal\Api\ItemList;
use \PayPal\Api\Payer;
use \PayPal\Api\Payment;
use \PayPal\Api\RedirectUrls;
use \PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use App\Models\Frontend\TourPayments;

use Illuminate\Validation\Rule;

use App\Models\Frontend\PaymentDetails;
use function GuzzleHttp\json_decode;

class tourPayPalController extends ToursControllerAdditional
{
    //
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
    public function pay_success($encrypted)
    {
        $tour = $this->getTourId($encrypted, true);
        
        $this->validate(request(), [
            'PayerID'=>'required',
            'token'=>'required',
            'paymentId'=>'required|unique:tour_payments,credentials'
        ]);
        $payment = Payment::get(request()->paymentId, $this->apiContext);
        
        $execution = new PaymentExecution();
        $execution->setPayerId(request()->PayerID);
        try {
            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() == 'approved') {
                // return $result;
                $mypayment = new TourPayments([
                    'credentials'=>request()->paymentId,
                    'amount'=>$result->transactions[0]->amount->total,
                    'method'=>"paypal"
                ]);
                
                $tour->tour_payments()->save($mypayment);
                $mypaymentDetails = paymentDetails::create([
                    'details'=>$result->toJSON()
                ]);
                $mypayment->details_id = $mypaymentDetails->id;
                $mypayment->save();
            }
            return redirect('/geschaeftskundenportal/tour/laststep/'.$encrypted);
            return $result;
        } catch (PayPalConnectionException $e) {
            return $e->getData();
        }
        abort(403, 'not autherized');
        return request()->all();
    }
    public function paywithPayPal($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        if (!$tour->accepted_offer||!$tour->accepted_offer->id) {
            $this->shipError('accepted_offer');
        }
        if (!$tour->tour_details->terms_accepted) {
            $this->shipError('terms_accepted');
        }
        $min = $tour->accepted_offer->company_offer;
        $this->validate(request(), [
            'paymentAmount'=>'required|numeric|min:'.$min,
        ]);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('tour number : '.$tour->id)
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice(request()->paymentAmount);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $amount = new Amount();
        $amount->setCurrency("EUR")
            ->setTotal(request()->paymentAmount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('tour number : '.$tour->id);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal_success_tour', $encrypted))
                    ->setCancelUrl(url('/geschaeftskundenportal/tour/laststep/'.$encrypted));

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
        return $approvalUrl;
    }
}
