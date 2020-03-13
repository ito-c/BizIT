<?php

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User([
            'name' => '吉田直志',
            'email' => 'tadashi@gmail.com',
            'password' =>  Hash::make('test123'),
            'division' => '個人企画部',
            'specialty' => '戦略担当',
            'hobby' => '音楽',
            'biography' => '初めまして、BizIT管理者の吉田です。よろしくお願いします。',
            'role_id' => '1',
            ]);
        $user->save();

        $user = new App\User([
            'name' => '吉澤 卓也',
            'email' => 'takuya@geekly.com',
            'password' =>  Hash::make('test123'),
            'specialty' => '採用担当',
            'biography' => '初めまして、BizIT管理者の吉澤です。よろしくお願いします。',
            'role_id' => '1',
            ]);
        $user->save();

        $user = new App\User([
            'name' => '[テストアカウント]',
            'email' => 'test_account@test000.com',
            'password' =>  Hash::make('test000'),
            'specialty' => '採用担当',
            'biography' => '初めまして、BizIT管理者のテストです。よろしくお願いします。',
            'role_id' => '1',
            ]);
        $user->save();

        factory(App\User::class, 17)->create();
    }
}
