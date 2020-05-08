<?php

namespace Tests\Feature;

use App\User; // ダミーユーザー
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{

     // テスト実行後にDBロールバック
     use RefreshDatabase;

    /**
     * ページ無しアドレスへのアクセス
     *
     * @return void
     */
    public function testNoRoute()
    {

        // ページ無しアドレスへアクセス
        $response = $this->get('no_route');
        // 404チェック
        $response->assertStatus(404);
    }


    /**
     * トップページ 未ログイン時リダイレクトテスト
     *
     * @return void
     */
    public function testHomeRedirect()
    {

        // 未ログイン時アクセス
        $response = $this->get(route('home'));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));
        
    }


    /**
     * トップページ 未ログイン時リダイレクトテスト
     *
     * @return void
     */
    public function testHomeIndex()
    {

        $this->withoutExceptionHandling();

        // テストDBにダミーユーザー作成、Seederと同様
        $user = factory(User::class)->create();

        // トップページへアクセス
        $response = $this
            // ->actingAs(User::find(1))
            ->actingAs($user)
            ->get(route('home'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('新着イシュー');
    }
}
