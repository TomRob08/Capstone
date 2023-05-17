<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class registerTest extends TestCase
{
    /**
     * A test to verify users can register.
     */
    public function test_registering_users(): void
    {
        $user = User::factory()->make();

        // $this->expectOutputString($user->username);
        // $this->expectOutputString($user->password);

        $response = $this->post('/register', ['username' => $user->username, 'password' => $user->password, 'password_confirmation', $user->password]);
        $response->assertStatus(302);

        $response->assertRedirect(route('home'));
    }
}
