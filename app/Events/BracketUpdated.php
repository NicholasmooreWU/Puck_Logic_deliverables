<?php
namespace App\Events;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
class BracketUpdated {
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $bracket;
    public function __construct($bracket) { $this->bracket = $bracket; }
}