<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        // テストDBにダミーユーザー作成
        $user = factory(User::class)->create();

        // イシュー投稿ページ表示テスト
        $response = $this
            ->actingAs($user)
            ->get(route('post.create'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('admin.post.create')
            ->assertSee('新規イシュー投稿');


        // イシュー一覧ページ（admin/post）※投稿無し
        $response = $this
            ->actingAs($user)
            ->get(route('post.index'));
        // チェック
        $response->assertStatus(200)
            ->assertViewIs('admin.post.index')
            ->assertSee('投稿はありません');

        // イシュー投稿テスト
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

    }
}
