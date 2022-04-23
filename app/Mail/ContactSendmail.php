<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $fullname;
    private $gender;
    private $email;
    private $postcode;
    private $address;
    private $building;
    private $opinion;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $inputs )
    {
        $this->fullname = $inputs['fullname'];
        $this->gender = $inputs['gender'];
        $this->email = $inputs['email'];
        $this->postcode = $inputs['postcode'];
        $this->address = $inputs['address'];
        $this->building = $inputs['building'];
        $this->opinion = $inputs['opinion'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('example@gmail.com')
        ->subject('自動送信メール')
        ->view('contact.mail')
        ->with([
            'fullname' => $this->fullname,
            'gender' => $this->gender,
            'email' => $this->email,
            'postcode' => $this->postcode,
            'address' => $this->address,
            'building' => $this->building,
            'opinion' => $this->opinion,
        ]);
    }
}
