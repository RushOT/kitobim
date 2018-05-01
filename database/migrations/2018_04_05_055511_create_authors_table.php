<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->string('country')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
        Schema::create('author_genre', function (Blueprint $table){
            $table->integer('author_id');
            $table->integer('genre_id');
            $table->primary(['author_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
        Schema::dropIfExists('author_genre');
    }
}
