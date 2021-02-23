<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $enquiry;
    public function __construct($enquiry)
    {
        $this->enquiry      =  $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['enquiry']    = $this->enquiry;
        return $this->subject('Thanks For Your Enquiry')->view('emails.enquiry',$data);
        // return $this->subject('Enquiry Mail')
        // ->from('arorad750@gmail.com')
        // ->to('arorad750@gmail.com')->view('contactmail');
    }
}
