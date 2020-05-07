<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use DateTime;
use App\Category;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{

    // テスト実行後にDBロールバック
    use RefreshDatabase;

    /**
     * 投稿詳細ページ 未ログイン時リダイレクトテスト
     *
     * @return void
     */
    public function testPostShowRedirect()
    {
        // 未ログイン時イシュー詳細アクセス
        $response = $this->get(route('post', ['id' => 1]));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));
    }

    /**
     * 投稿詳細ページ表示テスト
     *
     * @return void
     */
    public function testPostShow()
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

        // イシュー投稿
        // $response = $this
        //     ->actingAs($user)
        //     ->post('/admin/post', [
        //         'user_id' => $user->id,
        //         'category_id' => $category->id,
        //         'title' => 'Test',
        //         'description' => 'Test'
        //     ]);

        // ログイン後イシュー詳細ページへアクセス
        $response = $this
            ->actingAs($user)
            ->get(route('post', ['id' => 2]));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('post.index')
            ->assertSee('詳細');
    }
}
