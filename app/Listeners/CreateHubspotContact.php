<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Services\HubspotContactService;

class CreateHubspotContact
{
    /**
     * Handle the event.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $hubspotContact     = new HubspotContactService();
        $user               = $event->user;        
        $names              = explode(' ', $user->name);
        $lastname           = array_pop($names);
        $names              = implode(' ', $names);
    
        $resource           = $hubspotContact->createContact($names, $lastname, $user->email);
        $user->hubspot_id   = $resource->data->vid;

        $user->save();
    }
}
