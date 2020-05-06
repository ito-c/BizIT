<?php

namespace Tests\Feature;

use App\User; // ダミーユーザー
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions; // テスト実行後にDBロールバック
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{

     // テスト実行後にDBロールバック
     use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        // ページ無しアドレスへアクセス
        $response = $this->get('no_route');
        // 404チェック
        $response->assertStatus(404);

        // 未ログイン時アクセス
        $response = $this->get(route('home'));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));


        // テストDBにダミーユーザー作成、Seederと同様
        $user = factory(User::class)->create();

        // ログイン必須ページへアクセス
        $response = $this
            // ->actingAs(User::find(1))
            ->actingAs($user)
            ->get(route('home'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('新着イシュー');

        // ログイン後welcomeページヘッダーチェック
        $response = $this
            ->actingAs($user)
            ->get(route('welcome'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('welcome')
            ->assertSee('ログアウト');
    }
}
