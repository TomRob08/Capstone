<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HttpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pages_returns_a_successful_response_logged_out(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/challenges');
        $response->assertStatus(302);

        $response = $this->get('/profile');
        $response->assertStatus(302);

        $response = $this->get('/register');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->get('/add');
        $response->assertStatus(404);

        $response = $this->get('/delete');
        $response->assertStatus(404);

        $response = $this->get('/PreqlAndSql');
        $response->assertStatus(302);

        $response = $this->get('/agent');
        $response->assertStatus(302);

        $response = $this->get('/cryptography');
        $response->assertStatus(302);

        $response = $this->get('/pcap');
        $response->assertStatus(302);
    }

    public function test_pages_returns_a_successful_response_logged_in(): void
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/challenges');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/register');
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get('/login');
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get('/add');
        $response->assertStatus(404);

        $response = $this->actingAs($user)->get('/delete');
        $response->assertStatus(404);

        $response = $this->actingAs($user)->get('/PreqlAndSql');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/agent');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/cryptography');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/pcap');
        $response->assertStatus(200);
    }

    public function test_pages_returns_a_successful_response_admin(): void
    {
        $user = User::factory()->make([
            'isAdmin' => true,
        ]);

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/challenges');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/register');
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get('/login');
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get('/add');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/delete');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/PreqlAndSql');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/agent');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/cryptography');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/pcap');
        $response->assertStatus(200);
    }
}
