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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('url')->nullable();
            $table->double('price_tl');
            $table->double('price_usd')->nullable();
            $table->double('rent_deposit')->nullable();
            $table->double('rental_income')->nullable();
            $table->tinyInteger('credit_eligibility')->nullable();// 1:Suitable , 0:Not Suitable
            $table->tinyInteger('interchange')->nullable();// 1:yes , 0:No
            $table->double('dues')->nullable();
            $table->double('net_area');
            $table->double('gross_area');
            $table->integer('living_rooms_no');
            $table->integer('bedrooms_no');
            $table->integer('bathrooms_no');
            $table->integer('building_floors');
            $table->integer('floor_number');
            $table->boolean('is_furnished')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('status');
            // $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('user_status_id');
            $table->unsignedBigInteger('heating_type_id');
            $table->unsignedBigInteger('building_age_id');
            // $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('housing_type_id');
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('agent_id');
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
        Schema::dropIfExists('properties');
    }
};
