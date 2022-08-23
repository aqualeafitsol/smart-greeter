<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('what_for_you')->nullable()->after('order_tax');
            $table->text('step')->nullable()->after('what_for_you');
            $table->text('plan')->nullable()->after('step');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('what_for_you');
            $table->dropColumn('step');
            $table->dropColumn('plan');
        });
    }
}
