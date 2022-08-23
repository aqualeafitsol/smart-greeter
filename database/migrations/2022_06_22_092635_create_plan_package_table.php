<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_package', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('plan_id')->comment('subscription_plans table id');
            $table->foreign('plan_id')->references('id')->on('subscription_plans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_package');
    }
}
