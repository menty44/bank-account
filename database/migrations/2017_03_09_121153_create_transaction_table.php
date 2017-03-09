<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (schema::hasTable('transactions')) {
            Schema::drop('transactions');
        }
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount',10,2);
            $table->smallInteger('type');
            $table->date('date');
            $table->time('time');
            $table->smallInteger('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transactions');
    }

}
