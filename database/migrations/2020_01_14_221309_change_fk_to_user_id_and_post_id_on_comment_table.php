<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFkToUserIdAndPostIdOnCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('post_id')->unsigned()->change();
            $table->integer('user_id')->unsigned()->change();

            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
            
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign'); // ユーザーの外部キー削除
            $table->dropForeign('comments_post_id_foreign'); // 投稿の外部キー削除
        });
    }
}
