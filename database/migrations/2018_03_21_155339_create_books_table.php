<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('annotation')->nullable();
            $table->float('price')->default(0);
            $table->string('isbn')->nullable();
            $table->string('year')->nullable();
            $table->integer('publisher_id')->nullable();
            $table->date('published_date')->nullable();
            $table->time('published_time')->nullable();
            $table->integer('related_book_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('script')->nullable();
            $table->string('cover')->nullable();
            $table->string('epub')->nullable();
            $table->float('rating')->nullable();
            $table->boolean('is_pinned');
            $table->timestamps();
        });

        Schema::create('book_collection', function (Blueprint $table){
            $table->integer('book_id');
            $table->integer('collection_id');
            $table->primary(['book_id','collection_id']);
        });

        Schema::create('book_genre', function (Blueprint $table){
            $table->integer('book_id');
            $table->integer('genre_id');
            $table->primary(['book_id','genre_id']);
        });

        Schema::create('author_book', function (Blueprint $table){
            $table->integer('book_id');
            $table->integer('author_id');
            $table->primary(['book_id','author_id']);
        });

        Schema::create('book_user',function (Blueprint $table){
            $table->integer('book_id');
            $table->integer('user_id');
            $table->primary(['book_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('book_collection');
        Schema::dropIfExists('book_genre');
        Schema::dropIfExists('author_book');
        Schema::dropIfExists('book_user');
    }
}
