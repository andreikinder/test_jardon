<?php

namespace Tests\Browser;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testResgisterUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('register')
                ->type('name', 'Test User')
                ->type('email', 'test@example.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                //->screenshot('register')
                ->press('REGISTER')
                ->assertAuthenticated()
                ->assertRouteIs('dashboard');
        });
    }

//    public function test_new_users_can_register()
//    {
//        $response = $this->post('/register', [
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//            'password' => 'password',
//            'password_confirmation' => 'password',
//        ]);
//
//        $this->assertAuthenticated();
//        $response->assertRedirect(RouteServiceProvider::HOME);
//    }
}
