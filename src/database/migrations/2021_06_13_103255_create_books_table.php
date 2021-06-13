<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('author');
        });

        DB::table('books')->insert(
            [
                [
                    'name' => 'Romeo and Juliet',
                    'author' => 'William Shakespeare',
                ],
                [
                    'name' => 'War and Peace',
                    'author' => 'Leo Tolstoy',
                ],
                [
                    'name' => 'Anna Karenina',
                    'author' => 'Leo Tolstoy',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
