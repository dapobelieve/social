<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Category::class, 5)->create();
    	factory(App\Task::class, 6)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
