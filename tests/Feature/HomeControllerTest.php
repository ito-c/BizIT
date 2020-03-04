<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $user = factory(User::class)->create();

        $response = $this
            // ->actingAs(User::find(1))
            ->actingAs($user)
            ->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('新着イシュー');
    }
}
