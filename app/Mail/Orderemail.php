<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
class Orderemail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->customer=session()->get('customer_data');
        $this->order=$request;

         }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Mail For confirmation')
                    ->from('no_reply@project.com')
                    ->to($this->customer->email)
                    ->view('LetsShop.emails.confirmationorder' , ['customer' => $this->customer , 'order' => $this->order]);
    }
}
