<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Libraries\Doctrine\CharType;
use Doctrine\DBAL\Types\Type;

class RemoveColumnsSpent extends Migration
{
    public function __construct()
    {
        Type::addType('timestamp', 'DoctrineTimestamp\DBAL\Types\Timestamp');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function($table) {
            $table->dropColumn('daily_spent');
            $table->dropColumn('total_spent');
            $table->timestamp('created_at')->useCurrent()->change();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function($table) {
            $table->integer('daily_spent')->default('0');
            $table->integer('total_spent')->default('0');
        });
    }
}
