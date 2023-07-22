<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminReportEnquir extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $type;
    public $name;
    public function __construct($type,$name)
    {
        $this->type=$type;
        $this->name=$name;
    }


    

   
    public function build()
    {
        $data['type']=$this->type;
        $data['name']=$this->name;
        //return $this->markdown('emails.enquiry',$data);
        return $this->subject('Report Enquiry')
                    ->view('emails.adminenquiry',$data);
    }
}
