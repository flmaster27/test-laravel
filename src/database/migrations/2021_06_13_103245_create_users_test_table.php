<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_test', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('age');
        });

        DB::table('users_test')->insert(
            [
                [
                    'first_name' => 'Ivan',
                    'last_name' => 'Ivanov',
                    'age' => 18,
                ],
                [
                    'first_name' => 'Marina',
                    'last_name' => 'Ivanova',
                    'age' => 14,
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
        Schema::dropIfExists('users_test');
    }
}
