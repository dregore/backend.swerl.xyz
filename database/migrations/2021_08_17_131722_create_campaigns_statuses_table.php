<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Insert some stuff
        DB::table('campaigns_statuses')->insert(
            [
                [
                    'status' => 'running'
                ],
                [
                    'status' => 'stopped'
                ],
                [
                    'status' => 'paused'
                ],
                [
                    'status' => 'rejected'
                ],
                [
                    'status' => 'moderating'
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
        Schema::dropIfExists('campaigns_statuses');
    }
}
