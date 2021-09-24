<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('batch_id')->after('book_id');
            $table->softDeletes()->after('created_at');
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->date('renew_data')->nullable()->after('return_date');
            $table->boolean('status')->default('0')->after('batch_id');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
          $table->dropColumn('batch_id');
        });
    }
}
