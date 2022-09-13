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
        Schema::create('received_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recept_id')->onDelete('cascade');
            $table->foreignId('product_id');
            $table->integer('stock');
            $table->integer('stock_defective');
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
        Schema::dropIfExists('received_products');
    }
};
