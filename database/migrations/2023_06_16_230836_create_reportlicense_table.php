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
        Schema::create('reportlicense', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id');
            $table->double('single_user')->default(0.0)->index();
            $table->double('multi_user')->default(0.0)->index();
            $table->double('enterprise_user')->default(0.0)->index();
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
        Schema::dropIfExists('reportlicense');
    }
};
