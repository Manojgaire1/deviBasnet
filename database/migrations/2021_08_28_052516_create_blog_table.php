<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title',255);
            $table->string('slug',255);
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->integer('sort_order');
            $table->enum('status',['0','1'])->default('1')->index(); // 1 for active and 0 for inactive
            $table->enum('is_featured',['0','1'])->default('0')->index(); // 1 for featured that will be shown in the homepage
            $table->string('featured_image',255)->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('blogs');
    }
}
