<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    // テスト実行後にDBロールバック
    use RefreshDatabase;

    /**
     * 投稿詳細ページ 未ログイン時リダイレクトテスト
     *
     * @return void
     */
    public function testUserShowRedirect()
    {
        // 未ログイン時イシュー詳細アクセス
        $response = $this->get(route('user', ['id' => 1]));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));
    }

        /**
     * 投稿詳細ページ表示テスト
     *
     * @return void
     */
    public function testUserShow()
    {
        $this->withoutExceptionHandling();

        // テストDBにダミーユーザー作成
        $user = factory(User::class)->create();
        // 投稿用 テストDBにダミーカテゴリー作成
        $category = factory(Category::class)->create();
        // テストDBにダミー投稿作成
        $post = factory(Post::class, 1)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        // ログイン後イシュー詳細ページへアクセス
        $response = $this
            ->actingAs($user)
            ->get(route('user', ['id' => $user->id]));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('user.index')
            ->assertSee('投稿イシュー一覧');
    }


}
