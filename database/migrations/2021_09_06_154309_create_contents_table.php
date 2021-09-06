<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
   $table->bigIncrements('id');
            $table->string('token')->nullable();
            $table->text('name')->nullable();
                $table->longtext('brief_desc')->nullable();
            $table->string('category')->nullable();
            $table->string('cover_photo')->nullable();
            $table->longtext('extra_photos')->nullable();
            $table->longtext('description')->nullable();
            $table->string('status')->nullable();
            $table->string('extra_one')->nullable();
            $table->string('uploaded_by')->nullable();
            $table->string('extra_two')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
