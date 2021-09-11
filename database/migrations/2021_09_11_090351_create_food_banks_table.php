<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_banks', function (Blueprint $table) {
            $table->id();
            $table->string('token',500);
            $table->string('name',500)->nullable(false);
            $table->string('slug',500)->nullable(false);
            $table->string('physical_address',500)->nullable();
            $table->string('location',500)->nullable();
            $table->string('capacity',500)->nullable();
            $table->string('cooling',500)->nullable();
            $table->string('phone_number',500)->nullable();
            $table->string('email',500)->nullable();
            $table->string('website',500)->nullable();
             $table->string('image',500)->nullable();
            $table->longtext('description')->nullable();
            $table->string('status',500)->nullable();
           
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
        Schema::dropIfExists('food_banks');
    }
}
