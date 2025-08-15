<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('product_type', 100)->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('printing_method', ['offset_high_volume', 'digital_low_volume'])->nullable();
            $table->string('size_dimensions', 100)->nullable();
            $table->string('paper_type', 100)->nullable();
            $table->string('paper_weight_gsm', 50)->nullable();
            $table->string('color_specification', 100)->nullable();
            $table->string('binding_type', 100)->nullable();
            $table->string('lamination_type', 100)->nullable();
            $table->text('finishing_instructions')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('order_specifications');
    }
};
