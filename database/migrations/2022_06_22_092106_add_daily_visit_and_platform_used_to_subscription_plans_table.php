<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDailyVisitAndPlatformUsedToSubscriptionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->integer('daily_visit')->after('description')->default(0)->comment('1=>active,0=>inactive');
            $table->integer('platform_used')->after('daily_visit')->default(0)->comment('1=>active,0=>inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropColumn('daily_visit');
            $table->dropColumn('platform_used');
        });
    }
}
