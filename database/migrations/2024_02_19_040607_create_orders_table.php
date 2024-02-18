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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('couponId')->nullable();
            $table->char('code', 6)->unique();
            $table->unsignedBigInteger('date');
            $table->unsignedBigInteger('endAt')->nullable();
            $table->decimal('amountPaid', 10, 2, true)->nullable();
            $table->unsignedBigInteger('paidAt')->nullable();
            $table->unsignedBigInteger('hasStartedWorkAt')->nullable();
            $table->unsignedBigInteger('finishedWorkAt')->nullable();
            $table->string('customerName');
            $table->string('customerPhone');
            $table->string('customerEmail')->nullable();
            $table->text('customerAddress')->nullable();
            $table->unsignedBigInteger('createdAt');
            $table->unsignedBigInteger('updatedAt');

            $table->foreign('couponId')->references('id')
                                        ->on('coupons')
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
        Schema::dropIfExists('orders');
    }
};
