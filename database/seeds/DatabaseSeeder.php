<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            RolesTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            CategoryRequestsTableSeeder::class,
            LikesTableSeeder::class,
        ]);
    }
}
