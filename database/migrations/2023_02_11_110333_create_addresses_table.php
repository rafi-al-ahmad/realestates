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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('model_type', 127);
            $table->bigInteger('model_id');
            $table->string('country', 63);
            $table->string('province', 63);
            $table->string('city', 63);
            $table->string('district', 63);
            $table->string('address')->nullable();
            $table->string('postal_code', 15)->nullable();
            $table->json('geo')->nullable();
            $table->decimal('latitude',  17, 14)->nullable();
            $table->decimal('longitude', 17, 14)->nullable();
            $table->string('country_code', 3)->nullable();
            $table->string('language', 5)->nullable();
            $table->string('formatted_address')->nullable();
            $table->string('administrative_1', 63)->nullable();
            $table->string('administrative_2', 63)->nullable();
            $table->string('administrative_3', 63)->nullable();
            $table->string('administrative_4', 63)->nullable();
            $table->string('administrative_5', 63)->nullable();
            $table->string('locality', 63)->nullable();
            $table->string('route', 63)->nullable();
            $table->string('street_number', 15)->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
