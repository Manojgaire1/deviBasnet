<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            //
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->string('title',255);
            $table->string('slug',255);
            $table->string('featured_image',255)->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['0','1'])->default('1')->index(); // 1 for active and 0 for inactive
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('activities');
    }
}
