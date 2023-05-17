<?php

namespace Tests\Unit;

use Tests\TestCase;

class loginTest extends TestCase
{
    /**
     * A test for logging in users.
     */
    public function test_login_users(): void
    {
        $response = $this->post('/login', ['username' => 'james130', 'password' => 'password']);
        $response->assertStatus(302);

        $response->assertRedirect(route('challenge'));
    }
}
