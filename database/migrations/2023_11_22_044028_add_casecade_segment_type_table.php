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
        Schema::table('segment_graphical', function (Blueprint $table) {
            $table->dropForeign('segment_graphical_segment_types_foreign');
            $table->foreign('segment_types')
            ->references('id')
            ->on('segment_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('segment_graphical', function (Blueprint $table) {
            //
        });
    }
};
