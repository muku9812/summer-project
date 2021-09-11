<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('user_id');
            $table->unsignedBigInteger('book_id');
            $table->date('return_date');
            $table->date('Book_return_on')->nullable();
            $table->date('renew_date')->nullable();
            $table->date('issue_date');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('book_id')->references('id')->on('books');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
