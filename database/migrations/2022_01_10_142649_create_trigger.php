<?php

use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER update_current_balance BEFORE UPDATE ON users_finance FOR EACH ROW
            BEGIN
                set NEW.current_balance = NEW.total_topup - NEW.total_spent;
                IF NEW.current_balance<=0 THEN
                    Update campaigns set status = 6 where status = 1 and user_id = NEW.user_id;
                END IF;
                IF OLD.current_balance<=0 AND NEW.current_balance>0 THEN
                    Update campaigns set status = 1 where status = 6 and user_id = NEW.user_id;
                END IF;
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
        DB::unprepared('DROP TRIGGER `update_current_balance`');
    }
}
