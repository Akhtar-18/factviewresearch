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
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->longText('heading')->index()->nullable();
            $table->longText('url')->index()->nullable();
            $table->longText('description')->nullable();
            $table->longText('image')->nullable();
            $table->longText('image_alt')->nullable();
            $table->longText('schema')->nullable();
            $table->longText('meta_title')->nullable()->index();
            $table->longText('meta_des')->nullable()->index();
            $table->longText('metal_keywords')->nullable()->index();
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
