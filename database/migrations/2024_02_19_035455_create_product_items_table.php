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
        Schema::create('product_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('productId');
            $table->uuid('itemId');
            $table->unsignedBigInteger('createdAt');
            $table->unsignedBigInteger('updatedAt');

            $table->foreign('productId')->references('id')
                                        ->on('products')
                                        ->cascadeOnDelete()
                                        ->cascadeOnUpdate();

            $table->foreign('itemId')->references('id')
                                        ->on('items')
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
        Schema::dropIfExists('product_items');
    }
};
