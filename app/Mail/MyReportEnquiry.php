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
    public $reportName;
    public function __construct($types, $name, $reportName)
    {
        $this->types = $types;
        $this->name = $name;
        $this->reportName = $reportName;
    }





    public function build()
    {
        $data['type'] = $this->types;
        if ($data['type'] == 'request') {
            $data['type'] = 'REQUEST SAMPLE';
        } elseif ($data['type'] == 'enquiry') {
            $data['type'] = 'ENQUIRY BEFORE BUYING';
        } elseif ($data['type'] == 'discount') {
            $data['type'] = 'ASK FOR DISCOUNT';
        }
        $data['name'] = $this->name;
        $data['reportName'] = $this->reportName;
        return $this->subject('FactViewResearch | Thank you for your interest.')
            ->view('emails.enquiry', $data);
    }


}
