<?php

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
            'specialty' => '戦略',
            'hobby' => '音楽',
            'biography' => '初めまして、BizIT管理者の吉田です。よろしくお願いします。',
            'role_id' => '1',
          ]);
            $user->save();

        factory(App\User::class, 19)->create();
    }
}
