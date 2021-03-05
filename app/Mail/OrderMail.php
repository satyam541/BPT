<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $input;
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $input = $this->input;
        $subject = "";
        if($input['type']=="success")
        {
            $subject = "Payment Successfull";
        }
        else if($input['type']=="declined")
        {
            $subject = "Payment Declined";
        }
        else if($input['type']=="booking")
        {
            $subject = "Your Order Has Started";
        }
        else if($input['type'] == "incomplete")
        {
            $subject = "Order Generated";
        }
        return $this->subject($subject)->view('emails.cartOrder',$input);
    }
}
