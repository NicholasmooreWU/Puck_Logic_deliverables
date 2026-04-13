<?php
namespace App\Events;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
class StatUpdated {
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $stat;
    public function __construct($stat) { $this->stat = $stat; }
}