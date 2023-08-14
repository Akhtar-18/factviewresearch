<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminReportEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $type;
    public $name;
    public $reportName;
    public $reportUrl;
    public $email;
    public $country;
    public $contact_no;
    public $organizations;
    public $others;

    public function __construct($type, $name, $reportName, $reportUrl, $email, $country, $contact_no, $organizations, $others)
    {
        $this->type = $type;
        $this->name = $name;
        $this->reportName = $reportName;
        $this->reportUrl = $reportUrl;
        $this->email = $email;
        $this->country = $country;
        $this->contact_no = $contact_no;
        $this->organizations = $organizations;
        $this->others = $others;
    }





    public function build()
    {
        $data['type'] = $this->type;
        if ($data['type'] == 'request') {
            $data['type'] = 'REQUEST SAMPLE';
        } elseif ($data['type'] == 'enquiry') {
            $data['type'] = 'ENQUIRY BEFORE BUYING';
        } elseif ($data['type'] == 'discount') {
            $data['type'] = 'ASK FOR DISCOUNT';
        }
        $data['reportName'] = $this->reportName;
        $data['reportUrl'] = $this->reportUrl;
        $data['name'] = $this->name;
        $data['email'] = $this->email;
        $data['country'] = $this->country;
        $data['contact_no'] = $this->contact_no;
        $data['organizations'] = $this->organizations;
        $data['others'] = $this->others;

        //return $this->markdown('emails.enquiry',$data);
        return $this->subject('FactViewResearch | ' . $data['type'])
            ->view('emails.adminenquiry', $data);
    }
}
