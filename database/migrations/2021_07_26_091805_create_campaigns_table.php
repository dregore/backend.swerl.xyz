<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('campaign_id');
            $table->string('campaign_name');
            $table->string('target_url');
            $table->float('bid_cpm')->default('0.30');
            $table->integer('capping')->default('3');
            $table->integer('daily_budget')->default('-1');
            $table->integer('total_budget')->default('-1');
            $table->integer('daily_spent')->default('0');
            $table->integer('total_spent')->default('0');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('deleted')->default('0');
            $table->timestamps(); // created_at, updated_at
            $table->index('campaign_id');
            $table->index(['campaign_id', 'user_id']);
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
        Schema::dropIfExists('campaigns');
    }
}
