<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    /**
     * @return void
     */
    public function testRegister()
    {
        $user = User::factory()->make();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/register')
                ->type('name', $user->name)
                ->type('email', $user->email)
                ->type('dob', '2020-02-02')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->click('@register-button')
                ->assertPathIs('/payment')
            ;      
        });
    }
}
