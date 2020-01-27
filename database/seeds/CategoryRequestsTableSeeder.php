<?php

use Illuminate\Database\Seeder;

class CategoryRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRequest = new App\CategoryRequest([
            'name' => '追加カテゴリー名1',
            'description' => '理由、詳細'
          ]);
        $categoryRequest->save();

        $categoryRequest = new App\CategoryRequest([
            'name' => '追加カテゴリー名2',
            'description' => '理由、詳細'
          ]);
        $categoryRequest->save();

        $categoryRequest = new App\CategoryRequest([
            'name' => '追加カテゴリー名3',
            'description' => '理由、詳細'
          ]);
        $categoryRequest->save();
    }
}
