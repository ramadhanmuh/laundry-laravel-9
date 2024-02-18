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
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->char('code', 6)->unique();
            $table->decimal('discount', 5, 2, true);
            $table->unsignedBigInteger('startAt');
            $table->unsignedBigInteger('endAt');
            $table->unsignedTinyInteger('status')
                    ->comment('0 = Tidak Aktif; 1 = Aktif');
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
        Schema::dropIfExists('coupons');
    }
};
