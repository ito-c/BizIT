<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('division')->nullable()->change();
            $table->string('specialty')->nullable()->change();
            $table->string('hobby')->nullable()->change();
            $table->string('biography')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('division')->nullable(false)->change();
            $table->string('specialty')->nullable(false)->change();
            $table->string('hobby')->nullable(false)->change();
            $table->string('biography')->nullable(false)->change();
        });
    }
}
