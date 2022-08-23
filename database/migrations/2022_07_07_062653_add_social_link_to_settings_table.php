<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinkToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('facebook_link')->nullable()->after('order_tax');
            $table->string('twitter_link')->nullable()->after('facebook_link');
            $table->string('linkedin_link')->nullable()->after('twitter_link');
            $table->string('insta_link')->nullable()->after('linkedin_link');
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
            $table->dropColumn('facebook_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('linkedin_link');
            $table->dropColumn('insta_link');
        });
    }
}
