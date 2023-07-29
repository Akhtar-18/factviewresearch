<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyReportEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $types;
    public $name;
    public function __construct($types,$name)
    {
        $this->types=$types;
        $this->name=$name;
    }


    

   
    public function build()
    {
        $data['type']=$this->types;
        $data['name']=$this->name;
        return $this->subject('Enquiry Submitted')
                    ->view('emails.enquiry',$data);
    }

   
}
