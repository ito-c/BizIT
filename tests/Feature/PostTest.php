<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        // 未ログイン時イシュー詳細アクセス
        $response = $this->get(route('post', ['id' => 1]));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));


        // テストDBにダミーユーザー作成
        $user = factory(User::class)->create();
        // テストDBにダミー投稿作成
        $post = factory(Post::class)->create();

        // ログイン後イシュー詳細ページへアクセス
        $response = $this
            ->actingAs($user)
            ->get(route('post', ['id' => 1]));
        // チェック
        // $response->assertStatus(200)
        //     ->assertViewIs('post')
        //     ->assertSee('詳細');
    }
}
