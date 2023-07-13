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
        Schema::create('homepagesliders', function (Blueprint $table) {
            $table->id();
            $table->string('heading',200)->index();
            $table->string('subheading',200)->nullable()->index();
            $table->longText('content')->nullable()->index();
            $table->string('slider_image')->nullable()->index();
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
        Schema::dropIfExists('homepagesliders');
    }
};
