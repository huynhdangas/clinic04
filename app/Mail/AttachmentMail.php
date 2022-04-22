<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttachmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $qrcodeName;
    

    public function __construct($qrcodeName)
    {
        $this->qrcodeName = $qrcodeName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $qrcodeName = $this->qrcodeName;
        return $this->markdown('emails.attachment')
        ->subject('Dua ma QR cho nhan vien khi toi benh vien.')
        ->attach(public_path('/qrcode'.'/'.$qrcodeName));
    }
}
