<?php

namespace App\Http\Controllers\Frontend\tours;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hochstrasser\Wirecard\Context;
use Hochstrasser\Wirecard\Model\Common\PaymentType;
use Hochstrasser\Wirecard\Request\Seamless\Frontend\InitPaymentRequest;
use App\Mail\MailSender;
use App\Models\Backend\Emails;
use Hochstrasser\Wirecard\Fingerprint;
use App\Models\Frontend\TourPayments;
use Illuminate\Validation\Rule;

use App\Models\Frontend\PaymentDetails;

class tourPayWireController extends ToursControllerAdditional
{
    protected $context;
    public function __construct()
    {
        $this->context = new Context([
            'customer_id' => 'D200001',
            'secret' => 'B8AKTPWBRMNBV455FG6M2DANE99WU2',
            'language' => 'de',
        ]);
    }
    public function confirm($encrypted)
    {
        //to do send mails and other stuff
        return 'true';
    }
    public function success($encrypted=null)
    {
        $tour = $this->getTourId($encrypted);

        $this->validate(request(), [
            'orderNumber'=>'required|unique:tour_payments,credentials',
            'paymentState'=>['required',
            Rule::in(['SUCCESS'])
            ]
        ]);
        if (request()->paymentState!='SUCCESS') {
            abort(422);
        }
        $responseParameters = request()->all();
        $context = $this->context;
        $fingerprint = Fingerprint::fromResponseParameters($responseParameters, $context);
        if (!hash_equals(request()->responseFingerprint, (string) $fingerprint)) {
            // Fingerprint is not valid, abort
            // return 'hello';
            abort(403);
        }
        $payment = new TourPayments([
            'credentials'=>request()->orderNumber,
            'amount'=>request()->amount,
            'method'=>request()->paymentType
        ]);
        
        $tour->tour_payments()->save($payment);
        $paymentDetails = paymentDetails::create([
            'details'=>json_encode(request()->all())
        ]);
        $payment->details_id = $paymentDetails->id;
        $payment->save();
       
        return redirect('/geschaeftskundenportal/tour/laststep/'.$encrypted);
    }
    public function pay($encrypted)
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
            'paymentMethod'=>[function ($attribute, $value, $fail) {
                if (!PaymentType::isValid($value)) {
                    $fail('invalid payment Type');
                }
            }]
        ]);
        
    
        $context = $this->context;
        $request = InitPaymentRequest::with()
            ->setPaymentType(request()->paymentMethod)
            ->setAmount(request()->paymentAmount)
            ->setCurrency('EUR')
            ->setOrderDescription(trans('front/tourpayments.prepayment').''.$tour->id)
            ->setSuccessUrl(url('/geschaeftskundenportal/success/payment/'.$encrypted))
            ->setFailureUrl(url('/err'))
            ->setCancelUrl(url('/geschaeftskundenportal/tour/laststep/'.$encrypted))
            ->addParam('_token', csrf_token())
            ->setServiceUrl(url('/'))
            // Your callback controller for handling the result of the payment, you will
            // receive a POST request at this URL
            ->setConfirmUrl('https://kurier-link.com/api/tours/wirecard/confirm/{encrypted}')
            
            ->setConsumerUserAgent($_SERVER['HTTP_USER_AGENT'])
            ->setConsumerIpAddress(request()->ip())
            ->setContext($context);
        $client = new \GuzzleHttp\Client;
        
        $response = $request->createResponse($client->send($request->createHttpRequest()));
        if ($response->hasErrors()) {
            // Show errors in the UI
            abort(response()->json($response->getErrors(), 422));
        }
        return $response->toObject()->getRedirectUrl();
    }
}
