<?php

namespace App\Events;

use App\Models\TransferHistory;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransferEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transferHistory;

    public function __construct(TransferHistory $transferHistory)
    {
        $this->transferHistory = $transferHistory;
    }
}

