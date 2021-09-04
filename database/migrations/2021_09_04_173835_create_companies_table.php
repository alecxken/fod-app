<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
                  $table->string('token',500);
            $table->string('name',500)->nullable(false);
            $table->string('slug',500)->nullable(false);
            $table->string('physical_address',500)->nullable();
            $table->string('postal_address',500)->nullable();
            $table->string('postal_code',500)->nullable();
            $table->string('city',500)->nullable();
            $table->string('phone_number',500)->nullable();
            $table->string('email',500)->nullable();
            $table->string('website',500)->nullable();
            $table->text('description')->nullable();
            $table->string('rep_name',500)->nullable();
            $table->string('rep_phone_number',500)->nullable();
            $table->string('rep_email',500)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
