<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
             $table->string('name');           // e.g. VAT, Service Tax
            $table->decimal('rate', 5, 2);    // e.g. 15.00%
          $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');
            $table->string('type')->nullable(); // e.g. percentage, fixed
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
