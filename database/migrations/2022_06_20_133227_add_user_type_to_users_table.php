<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('user_type')->after('remember_token')->comment('1=Admin,2=Customer');
            $table->enum('gender', ['Male', 'Female', 'Other'])->after('user_type');
            $table->integer('status')->after('gender')->default(1)->comment('1=>Active,0=>Inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
            $table->dropColumn('gender');
            $table->dropColumn('status');
        });
    }
}
