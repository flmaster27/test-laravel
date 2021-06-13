<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users_test')
            ;

            $table
                ->foreign('book_id')
                ->references('id')
                ->on('books')
            ;
        });

        DB::table('user_books')->insert(
            [
                [
                    'user_id' => 1,
                    'book_id' => 2,
                ],
                [
                    'user_id' => 2,
                    'book_id' => 2,
                ],
                [
                    'user_id' => 2,
                    'book_id' => 3,
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
        Schema::dropIfExists('user_books');
    }
}
