<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Subscription extends Component
{
    public function render()
    {
        return view('livewire.profile.subscription', [
            'plan'  => Auth::user()->asStripeCustomer()->subscriptions->data[0]->plan
        ]);
    }
}
