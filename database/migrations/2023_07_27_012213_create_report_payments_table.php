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
        Schema::create('report_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->constrained()->cascedeOnDelete();
            $table->string('name',120)->nullable();
            $table->string('company_name',120)->nullable();
            $table->string('job_title',120)->nullable();
            $table->string('country_name',120)->nullable();
            $table->string('state_name',120)->nullable();
            $table->string('city_name',120)->nullable();
            $table->string('zip_code',120)->nullable();
            $table->string('email',120)->nullable();
            $table->string('contact',120)->nullable();
            $table->double('lisence_amount')->default(0.00)->nullable();
            $table->text('address')->nullable();
            $table->enum('status',['0','1'])->default('0');
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
        Schema::dropIfExists('report_payments');
    }
};
