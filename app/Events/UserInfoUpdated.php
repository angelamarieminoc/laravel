<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\User;

class UserInfoUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $currentEmail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, string $currentEmail)
    {
        $this->user         = $user;
        $this->currentEmail = $currentEmail;
    }
}