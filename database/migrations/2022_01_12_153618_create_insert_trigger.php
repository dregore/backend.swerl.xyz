<?php

use Illuminate\Database\Migrations\Migration;

class CreateInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE
            TRIGGER insert_current_balance BEFORE INSERT
            ON users_finance
            FOR EACH ROW BEGIN
                set NEW.current_balance = NEW.total_topup;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP TRIGGER `insert_current_balance`');
    }
}
