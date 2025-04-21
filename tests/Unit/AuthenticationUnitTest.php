<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\AuthService;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Hash;

class AuthenticationUnitTest extends TestCase
{
    protected AuthService $authService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authService = new AuthService();
    }

    public function test_login_success_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'huancacori@gmail.com',
            'password' => password_hash('12345678', PASSWORD_BCRYPT)
        ]);

        $result = $this->authService->login([
            'email' => 'huancacori@gmail.com',
            'password' => '12345678',
        ]);

        $this->assertTrue($result);
        $this->assertAuthenticatedAs($user);
    }
}
