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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 10, 2, true);
            $table->decimal('quantity', 10, 2, true)
                    ->comment('Batas banyak barang untuk harga yang ditentukan.');
            $table->decimal('maximumQuantity', 10, 2, true)
                    ->comment('Jumlah maksimal yang bisa dibeli.');
            $table->string('unit')->comment('Satuan barang.');
            $table->string('smallImage')->nullable();
            $table->string('mediumImage')->nullable();
            $table->string('largeImage')->nullable();
            $table->unsignedTinyInteger('status')
                    ->comment('0 = Tidak Aktif; 1 = Aktif');
            $table->string('metaDescription');
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
        Schema::dropIfExists('products');
    }
};
