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
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('orderId');
            $table->unsignedTinyInteger('rate');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('createdAt');
            $table->unsignedBigInteger('updatedAt');

            $table->foreign('orderId')->references('id')
                                        ->on('orders')
                                        ->cascadeOnDelete()
                                        ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
