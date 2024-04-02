<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransferNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $senderName;
    public $recipientName;
    public $amount;

    public function __construct($senderName, $recipientName, $amount)
    {
        $this->senderName = $senderName;
        $this->recipientName = $recipientName;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->subject('Transfer Notification')->view('emails.transfer_notification');
    }
}

