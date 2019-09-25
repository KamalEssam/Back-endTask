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
         $this->call(postsSeeder::class);//for posts
         $this->call(usersSeeder::class);//for users
    }
}
