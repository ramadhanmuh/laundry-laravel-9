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
        Schema::create('about_section', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('summary');
            $table->string('firstIconTitle');
            $table->string('firstIconSummary');
            $table->string('firstIconImage');
            $table->string('secondIconTitle');
            $table->string('secondIconSummary');
            $table->string('secondIconImage');
            $table->string('thirdIconTitle');
            $table->string('thirdIconSummary');
            $table->string('thirdIconImage');
            $table->string('fourthIconTitle');
            $table->string('fourthIconSummary');
            $table->string('fourthIconImage');
            $table->unsignedBigInteger('createdAt');
            $table->unsignedBigInteger('updatedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_section');
    }
};
