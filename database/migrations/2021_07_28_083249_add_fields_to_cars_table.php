<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->renameColumn('car_name', 'name');
            $table->renameColumn('image_url', 'image');
            $table->string('color')->nullable();
            $table->string('model')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('fuel')->nullable();
            $table->string('gearbox')->nullable();
            $table->string('origin')->nullable();
            $table->date('manufactured_date')->nullable();
            $table->integer('seat_number')->nullable();
            $table->integer('door_number')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('view_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
