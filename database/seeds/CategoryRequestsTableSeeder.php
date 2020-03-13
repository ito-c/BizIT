<?php

use Carbon\Carbon;
use Faker\Provider\DateTime;
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
            'name' => 'カテゴリー名が入る1',
            'description' => '理由、詳細',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
          ]);
        $categoryRequest->save();

        $categoryRequest = new App\CategoryRequest([
            'name' => 'カテゴリー名が入る2',
            'description' => '理由、詳細',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
          ]);
        $categoryRequest->save();

        $categoryRequest = new App\CategoryRequest([
            'name' => 'カテゴリー名が入る3',
            'description' => '理由、詳細',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
          ]);
        $categoryRequest->save();
    }
}
