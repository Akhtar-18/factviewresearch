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
        Schema::create('segment_graphical', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id')->index();
            $table->string('segmentname', 200)->index()->nullable();
            $table->string('segmentvalue', 150)->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segment_graphical');
    }
};
