<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->double('net_area')->nullable()->change();
            $table->double('gross_area')->nullable()->change();
            $table->integer('living_rooms_no')->nullable()->change();
            $table->integer('bedrooms_no')->nullable()->change();
            $table->integer('bathrooms_no')->nullable()->change();
            $table->integer('building_floors')->nullable()->change();
            $table->integer('floor_number')->nullable()->change();
            $table->unsignedBigInteger('user_status_id')->nullable()->change();
            $table->unsignedBigInteger('heating_type_id')->nullable()->change();
            $table->unsignedBigInteger('building_age_id')->nullable()->change();
            $table->unsignedBigInteger('housing_type_id')->nullable()->change();
            $table->unsignedBigInteger('property_type_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->double('net_area')->nullable(false)->change();
            $table->double('gross_area')->nullable(false)->change();
            $table->integer('living_rooms_no')->nullable(false)->change();
            $table->integer('bedrooms_no')->nullable(false)->change();
            $table->integer('bathrooms_no')->nullable(false)->change();
            $table->integer('building_floors')->nullable(false)->change();
            $table->integer('floor_number')->nullable(false)->change();
            $table->unsignedBigInteger('user_status_id')->nullable(false)->change();
            $table->unsignedBigInteger('heating_type_id')->nullable(false)->change();
            $table->unsignedBigInteger('building_age_id')->nullable(false)->change();
            $table->unsignedBigInteger('housing_type_id')->nullable(false)->change();
            $table->unsignedBigInteger('property_type_id')->nullable(false)->change();
        });
    }
};
