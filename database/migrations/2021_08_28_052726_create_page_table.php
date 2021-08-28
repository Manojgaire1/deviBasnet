<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            //
            $table->id();
            $table->string('title',255);
            $table->string('slug',255);
            $table->string('featured_image',255)->nullable();
            $table->string('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->integer('sort_order')->index();
            $table->enum('status',['0','1'])->default('1')->index();
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
        Schema::dropIfExists('pages');
    }
}
