<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_finance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('total_topup', 11, 2)->default('0.0');
            $table->decimal('total_spent', 11, 2)->default('0.0');
            $table->decimal('current_balance', 11, 2)->default('0.0');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_finance');
    }
}
