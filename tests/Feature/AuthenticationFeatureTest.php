<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_login_with_correct_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => 'huancacori@gmail.com',
            'password' => '12345678'
        ]);        
        $this->assertAuthenticated();
        $response->assertRedirect('/principal');        
    }

    public function test_user_cannot_login_with_incorrect_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => 'huancacori@gmail.com',
            'password' => '123456789'
        ]);
        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
