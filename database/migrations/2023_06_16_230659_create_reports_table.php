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
            $table->longText('heading')->index();
            $table->longText('url')->index();
            $table->longText('description')->nullable();
            $table->longText('toc')->nullable();
            $table->longText('segment')->nullable();
            $table->longText('methodology')->nullable();
            $table->string('publish_month',100)->nullable()->index();
            $table->longText('pages')->index()->nullable();
            $table->longText('graphical_data')->nullable();
            $table->longText('image')->nullable();
            $table->longText('image_alt')->nullable();
            $table->longText('customized')->nullable();
            $table->longText('schema')->nullable();
            $table->longText('meta_title')->nullable()->index();
            $table->longText('meta_des')->nullable()->index();
            $table->longText('metal_keywords')->nullable()->index();
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
