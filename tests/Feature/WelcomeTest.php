<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeTest extends TestCase
{

     // テスト実行後にDBロールバック
     use RefreshDatabase;

    /**
     * welcomeページ　表示テスト
     *
     * @return void
     */
    public function testWelcome()
    {
        $this->withoutExceptionHandling();

        // welcomeページ正常表示チェック
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('welcome')
            ->assertSee('「ITやデジタルは難しい。誰に聞けば…。」');
    }


    /**
     * ログイン後welcomeページ　ヘッダー表示テスト
     *
     * @return void
     */
    public function testWelcomeHeaderAuth()
    {

        $this->withoutExceptionHandling();

        // テストDBにダミーユーザー作成、Seederと同様
        $user = factory(User::class)->create();

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
