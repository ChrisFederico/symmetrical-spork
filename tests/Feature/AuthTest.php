<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    public function test_authenticated_user_can_access_beers_page()
    {
        $user = User::create([
            'name' => 'root',
            'email' => 'root@email.it',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'name' => 'root',
            'email' => 'root@email.it',
            'password' => 'password',
        ]);

        $response->assertRedirect('/beers');
        $response->assertSessionHas('token');
        $this->assertAuthenticatedAs($user);

        $beersResponse = $this->get('/beers');
        $beersResponse->assertStatus(200);
        $beersResponse->assertSee('Beers');
    }

    public function test_invalid_credentials_redirects_back_to_login()
    {
        $response = $this->post('/login', [
            'username' => 'invalid',
            'email' => 'invalid',
            'password' => 'invalid',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

}
