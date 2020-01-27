<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new App\Category([
            'name' => '情報共有',
          ]);
        $category->save();

        $category = new App\Category([
            'name' => '協力依頼',
          ]);
        $category->save();

        $category = new App\Category([
            'name' => '教えてください',
          ]);
        $category->save();

        $category = new App\Category([
            'name' => 'その他',
          ]);
        $category->save();

    }
}
