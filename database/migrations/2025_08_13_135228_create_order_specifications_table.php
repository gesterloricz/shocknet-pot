<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('product_type');
            $table->integer('quantity');
            $table->string('printing_method');
            $table->string('size');
            $table->string('paper_type');
            $table->string('paper_weight');
            $table->string('color_spec');
            $table->string('finishing_option')->nullable();
            $table->string('binding_type')->nullable();
            $table->string('lamination_type')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('order_specifications');
    }
};
