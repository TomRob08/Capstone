<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class challengeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_challenge_answer_check_correct(): void
    {
        $user = User::factory()->make([
            'id' => '1',
            'username' => 'TomRob'
        ]);

        $response = $this->actingAs($user)->post('/challenges',([
            'answer' => 'free',
            'name' => 'Free Space'
        ]));

        $this->assertTrue($response->getSession()->get('$isCorrect'));
    }

    public function test_challenge_answer_check_incorrect(): void
    {
        $user = User::factory()->make([
            'id' => '1',
            'username' => 'TomRob'
        ]);

        $response = $this->actingAs($user)->post('/challenges',([
            'answer' => 'test',
            'name' => 'Free Space'
        ]));

        $this->assertFalse($response->getSession()->get('$isCorrect'));
    }
}
