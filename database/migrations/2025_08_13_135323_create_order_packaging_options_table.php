<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_packaging_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('packaging_option_id')->constrained('packaging_options')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['order_id', 'packaging_option_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('order_packaging_options');
    }
};
