<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('token',500);
            $table->string('donor',500)->nullable(false);
            $table->string('food_bank',500)->nullable(false);
            $table->string('description',500)->nullable();
            $table->string('category',500)->nullable();
            $table->string('donation_date',500)->nullable();
            $table->string('comments',500)->nullable();
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
        Schema::dropIfExists('donations');
    }
}
