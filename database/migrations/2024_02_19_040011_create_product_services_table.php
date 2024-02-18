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
        Schema::create('product_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('productId');
            $table->uuid('serviceId');
            $table->unsignedBigInteger('createdAt');
            $table->unsignedBigInteger('updatedAt');

            $table->foreign('productId')->references('id')
                                        ->on('products')
                                        ->cascadeOnDelete()
                                        ->cascadeOnUpdate();

            $table->foreign('serviceId')->references('id')
                                        ->on('services')
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
        Schema::dropIfExists('product_services');
    }
};
