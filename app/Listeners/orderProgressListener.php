<?php

namespace App\Listeners;

use \Illuminate\Queue\InteractsWithQueue;
use \Illuminate\Contracts\Queue\ShouldQueue;
use \App\Events\orderProgress;
use App\Models\Backend\Emails;
use App\Mail\MailSender;
use \App\Models\Frontend\Order;
use Illuminate\Support\Facades\Crypt;

class orderProgressListener implements ShouldQueue
{
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    use InteractsWithQueue;
    public $queue = 'orders';
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(orderProgress $event)
    {
        if ($event->sendEmailAndController[0]&&$event->sendEmailAndController[1]) {
            $this->sendAdminEmail($event->order, trans($event->sendEmailAndController[1]));
        }
        if ($event->sendEmails==true) {
            $this->sendEmail($event->order->id, $event->order->sender->email, $event->order->sender->first_name);
        }
        return 1;
    }
    public function sendEmail($order_id, $email, $name)
    {
        $RegisterEmail = Emails::where('title', '=', 'Un-completed Order')->first();

        
        $data = [
            'name' => $name,
            'order_num'=> $order_id,
            'complete_url'=> url('/draft', Crypt::encrypt(['id'=>$order_id])),
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'title'    => $RegisterEmail->title,
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'order_id'    => $order_id,
            'encrypted'    => Crypt::encrypt($order_id),
        ];
        \Mail::send(
            'frontend.emails.mail',
            ['data' => $data],
            function ($message) use ($data) {
                $message
                    ->from($data['no-reply'], $data['name'])
                    ->to($data['email'])->subject($data['subject']);
            }
        );

        return 1;
    }
    public function sendAdminEmail(Order $order, $description='')
    {
        $RegisterEmail = Emails::where('title', '=', 'AdminStatusEmail')->first();

        $data = [
            'orderStatus'=>$order->status,
            'orderId'=>$order->id,
            'description'=>$description
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        \Mail::to(['corbeigt@hotmail.com'], 'Kurier Link Admin')
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
        return 1;
    }
}
