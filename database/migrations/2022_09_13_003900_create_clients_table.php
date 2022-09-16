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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->char('document_type')->default('V');
            $table->integer('document_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('last_purchase')->nullable();
            $table->unsignedInteger('total_purchase')->default(0);
            $table->unsignedDecimal('total_paid')->default(0.00);
            $table->timestamps();
            $table->boolean('is_active')->default(true);
            $table->decimal('balance', 30, 0)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
