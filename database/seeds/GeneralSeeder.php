<?php

use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Publisher::class, 50)->create();
        factory(App\Book::class, 50)->create();
        factory(App\Author::class, 50)->create();
    }
}
