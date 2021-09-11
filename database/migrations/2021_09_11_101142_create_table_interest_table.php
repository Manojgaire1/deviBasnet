<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('slug',200);
            $table->text('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('hover_icon_path')->nullable();
            $table->enum('status',['1','0'])->default('1')->index();
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
        Schema::dropIfExists('interests');
    }
}
