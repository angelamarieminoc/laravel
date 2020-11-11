<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create([
            'dob' => '2020-02-02'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->click('@login-button')
                ->assertPathIs('/payment')
            ;      
        });
    }
}
