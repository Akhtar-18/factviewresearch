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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
            $table->string('heading')->index();
            $table->string('url')->index();
            $table->text('description')->nullable();
            $table->text('toc')->nullable();
            $table->text('segment')->nullable();
            $table->text('methodology')->nullable();
            $table->string('publish_month',100)->nullable()->index();
            $table->string('pages')->index();
            $table->text('graphical_data')->nullable();
            $table->text('image')->nullable();
            $table->text('image_alt')->nullable();
            $table->text('customized')->nullable();
            $table->text('schema')->nullable();
            $table->string('meta_title')->index();
            $table->string('meta_des')->index();
            $table->string('metal_keywords')->index();
            $table->softDeletes();
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
        Schema::dropIfExists('reports');
    }
};
