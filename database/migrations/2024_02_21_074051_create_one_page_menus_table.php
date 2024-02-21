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
        Schema::create('one_page_menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('menuId');
            $table->string('name', 100);
            $table->string('slug');
            $table->unsignedTinyInteger('number');
            $table->unsignedBigInteger('createdAt');
            $table->unsignedBigInteger('updatedAt');

            $table->foreign('menuId')->references('id')
                                        ->on('menus')
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
        Schema::dropIfExists('one_page_menus');
    }
};
