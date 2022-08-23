<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChekboxColumnToStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stickers', function (Blueprint $table) {
            $table->string('chk_name')->after('name')->nullable();
            $table->string('chk_bio')->after('bio')->nullable();
            $table->string('chk_phone')->after('phone')->nullable();
            $table->string('chk_email')->after('email')->nullable();
            $table->string('chk_address')->after('address')->nullable();
            $table->string('chk_g_map_link')->after('g_map_link')->nullable();
            $table->string('chk_url')->after('url')->nullable();
            $table->string('chk_social')->after('insta_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stickers', function (Blueprint $table) {
            $table->dropColumn('chk_name');
            $table->dropColumn('chk_bio');
            $table->dropColumn('chk_phone');
            $table->dropColumn('chk_email');
            $table->dropColumn('chk_address');
            $table->dropColumn('chk_g_map_link');
            $table->dropColumn('chk_url');
            $table->dropColumn('chk_social');
        });
    }
}
