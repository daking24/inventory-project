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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->string('reference')->nullable();
            $table->foreignId('client_id')->nullable();
            $table->foreignId('sale_id')->nullable()->onDelete('cascade');
            $table->foreignId('provider_id')->nullable();
            $table->foreignId('transfer_id')->nullable()->onDelete('cascade');
            $table->foreignId('payment_methods_id');
            $table->foreignId('user_id');
            $table->decimal('amount', 30,2);
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
        Schema::dropIfExists('transactions');
    }
};
