<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PopulateCampaignsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::truncate('campaigns_statuses');
    }
}
