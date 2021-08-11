<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerColumnToConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config', function (Blueprint $table) {
            $table->dropColumn('banner1');
            $table->dropColumn('banner2');
            $table->unsignedInteger('banner1_id')->nullable(false);
            $table->unsignedInteger('banner2_id')->nullable(false);
            $table->unsignedInteger('banner3_id')->nullable(false);
            $table->unsignedInteger('banner4_id')->nullable(false);
            $table->foreign('banner1_id')->references('id')->on('cars');
            $table->foreign('banner2_id')->references('id')->on('cars');
            $table->foreign('banner3_id')->references('id')->on('cars');
            $table->foreign('banner4_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config', function (Blueprint $table) {
            //
        });
    }
}
