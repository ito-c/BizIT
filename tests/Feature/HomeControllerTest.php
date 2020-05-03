<?php

namespace Tests\Feature;

use App\User; // ダミーデータ
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions; // テスト用DB
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{

     // テスト用DB
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // テストDBにユーザー作成
        $user = factory(User::class)->create();

        // ログイン必須ページテスト
        $response = $this
            // ->actingAs(User::find(1))
            ->actingAs($user)
            ->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('新着イシュー');
    }
}
