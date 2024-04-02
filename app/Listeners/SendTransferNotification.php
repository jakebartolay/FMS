<?php

namespace App\Listeners;

use App\Events\TransferEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTransferNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    use InteractsWithQueue;

    public function handle(TransferEvent $event)
    {
        $transferHistory = $event->transferHistory;
        
        // Get the necessary data for the email
        if ($transferHistory && $transferHistory->sender) {
            // Access sender's firstname and lastname
            $senderName = $transferHistory->sender->firstname . ' ' . $transferHistory->sender->lastname;
        } else {
            // Handle case when sender or transfer history is null
            // Log error or return appropriate response
        }
        
        // Example: send an email notification
        if (auth()->check()) {
            $email = auth()->user()->email;
        } else {
            // User is not authenticated, handle the case accordingly
        }
        
        // Mail::to($transferHistory->sender->email)->send(new TransferNotificationMail($senderName, $recipientName, $amount));
    }
}
