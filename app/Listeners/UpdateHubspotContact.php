<?php

namespace App\Listeners;

use App\Events\UserInfoUpdated;
use App\Services\HubspotContactService;

class UpdateHubspotContact
{
    /**
     * Handle the event.
     *
     * @param UserInfoUpdated $event
     * @return void
     */
    public function handle(UserInfoUpdated $event)
    {
        $hubspotContact = new HubspotContactService();
        $user           = $event->user;        
        $names          = explode(' ', $user->name);
        $lastname       = array_pop($names);
        $names          = implode(' ', $names);
    
        $hubspotContact->updateContact($user->hubspot_id, $names, $lastname, $user->email);
    }
}
