<?php

namespace App\Events;

use App\Models\fms10_transferhistory;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransferEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transferHistory;

    public function __construct(fms10_transferhistory $transferHistory)
    {
        $this->transferHistory = $transferHistory;
    }
}

