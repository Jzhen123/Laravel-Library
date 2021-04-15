<?php

namespace Database\Seeders;

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
        $conditions = ['Destroyed', 'Messed Up', 'Okay', 'Good', 'New'];
        foreach ($conditions as $condition) {\DB::insert('insert into conditions (label) values(?)',[$condition]);}
      
        \App\Models\User::factory(10)->create();
        \App\Models\Book::factory(10)->create();

    }
}
