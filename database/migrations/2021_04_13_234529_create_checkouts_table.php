<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
//             $table->integer('user_id');
//             $table->integer('book_id');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->dateTime('checked_out');
            $table->dateTime('due_date');
            $table->dateTime('returned_date')->nullable();
            $table->integer('checked_out_condition');
            $table->integer('checked_in_condition')->nullable();
            $table->timestamps();
          
//           $table->foreignId('user_id')->constrained();
//             $table->foreign('user_id')
//                 ->references('id')
//                 ->on('users')
//                 ->onDelete('cascade');
//             $table->foreign('book_id')
//                 ->references('id')
//                 ->on('books')
//                 ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
