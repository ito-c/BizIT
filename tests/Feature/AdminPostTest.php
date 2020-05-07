<?php

namespace Tests\Feature;

use App\User;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 新規投稿ページ　未ログイン時リダイレクトテスト
     *
     * @return void
     */
    public function testAdminPostCreateRedirect()
    {
        // 未ログイン時アクセス
        $response = $this->get(route('post.create'));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));
    }

    /**
     * 新規投稿ページ表示テスト
     *
     * @return void
     */
    public function testAdminPostCreate()
    {

        $this->withoutExceptionHandling();

        // テストDBにダミーユーザー作成
        $user = factory(User::class)->create();

        // イシュー新規投稿ページ表示テスト
        $response = $this
            ->actingAs($user)
            ->get(route('post.create'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('admin.post.create')
            ->assertSee('新規イシュー投稿');
    }

    /**
     * イシュー一覧ページ　未ログイン時リダイレクトテスト
     *
     * @return void
     */
    public function testAdminPostIndexRedirect()
    {
        // 未ログイン時アクセス
        $response = $this->get(route('post.index'));
        // リダイレクトチェック
        $response->assertRedirect(route('login'));
    }

    /**
     * イシュー一覧ページ表示テスト
     *
     * @return void
     */
    public function testAdminPostIndex()
    {

        $this->withoutExceptionHandling();

        // テストDBにダミーユーザー作成
        $user = factory(User::class)->create();

        // イシュー一覧ページ（admin/post）※投稿無し
        $response = $this
            ->actingAs($user)
            ->get(route('post.index'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('admin.post.index')
            ->assertSee('投稿はありません');


        // 投稿用 テストDBにダミーカテゴリー作成
        $category = factory(Category::class)->create();

        // テストDBにダミー投稿作成
        $response = $this
            ->actingAs($user)
            ->post('/admin/post', [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'Test',
                'description' => 'Test'
            ]);
        // チェック（投稿一覧へリダイレクト）
        $response->assertStatus(302);

        // イシュー一覧ページ（admin/post）※投稿あり
        $response = $this
            ->actingAs($user)
            ->get(route('post.index'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('admin.post.index')
            ->assertSee('編集する');
    }
}
