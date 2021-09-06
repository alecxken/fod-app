<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentDropdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_dropdowns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token');
            $table->string('table_name');
            $table->string('column_name');
            $table->string('item');
            $table->string('item_desc')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('content_dropdowns');
    }
}
