<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChkProfileImageAndChkCoverImageToStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stickers', function (Blueprint $table) {
            $table->string('chk_profile_image')->nullable()->after('profile_image');
            $table->string('chk_cover_image')->nullable()->after('cover_image');
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
            $table->dropColumn('chk_profile_image');
            $table->dropColumn('chk_cover_image');
        });
    }
}
