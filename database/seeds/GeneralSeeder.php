<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Publisher::class, 20)->create();
        factory(App\Book::class, 100)->create();
        factory(App\Author::class, 50)->create();

        $author = 1;
        for ($i = 1; $i < 101; $i++){
            if ($i % 2 == 0){
                $author++;
            }
            DB::insert('insert into author_book (book_id, author_id) values (?,?)',[$i,$author]);

            $rnd1 = rand(1,32);
            do {
                $rnd2 = rand(1,32);
            } while ($rnd1 == $rnd2);
            DB::insert('insert into book_genre (book_id, genre_id) values (?,?)',[$i,$rnd1]);
            DB::insert('insert into book_genre (book_id, genre_id) values (?,?)',[$i,$rnd2]);
        }
    }
}