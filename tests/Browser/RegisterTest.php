<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/homepage') //Go to the homepage
                    ->clickLink('Register') //Click the Register link
                    ->assertSee('Register') //Make sure the phrase in the arguement is on the page
            //Fill the form with these values
                    ->value('#first_name', 'Joe') 
                    ->value('#last_name', 'Hisaishi')
                    ->value('#email', 'joe@example.com')
                    ->value('#password', '123456')
                    ->value('#password-confirm', '123456')
                    ->click('button[type="submit"]') //Click the submit button on the page
                    ->assertPathIs('/login') //Make sure you are in the home page
            //Make sure you see the phrase in the arguement
                    ->assertSee("We sent you an activation code. Check your email and click on the link to verify."); 
        });
    }
}
