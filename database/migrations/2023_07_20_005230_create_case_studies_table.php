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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->index()->nullable();
            $table->text('url')->index()->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('image_alt')->nullable();
            $table->text('schema')->nullable();
            $table->text('meta_title')->nullable()->index();
            $table->text('meta_des')->nullable()->index();
            $table->text('metal_keywords')->nullable()->index();
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
        Schema::dropIfExists('case_studies');
    }
};
