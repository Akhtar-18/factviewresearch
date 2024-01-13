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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id')->index()->nullable();
            $table->string('heading')->index();
            $table->string('url')->index();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('image_alt')->nullable();
            $table->text('schema')->nullable();
            $table->text('meta_title')->index();
            $table->text('meta_des')->index();
            $table->text('metal_keywords')->index();
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
};
