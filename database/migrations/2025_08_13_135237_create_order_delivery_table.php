<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_delivery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->date('required_delivery_date')->nullable();
            $table->enum('priority_level', ['low', 'normal', 'high', 'urgent'])->default('normal');
            $table->text('delivery_address')->nullable();
            $table->string('delivery_method', 100)->nullable();
            $table->string('estimated_production_time', 100)->nullable();
            $table->text('special_instructions')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('order_delivery');
    }
};
