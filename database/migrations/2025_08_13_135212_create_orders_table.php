<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 50)->unique();

            // Reference correct PK in clients table
            $table->foreignId('client_id')
                ->constrained('clients', 'client_id')
                ->cascadeOnDelete();

            // Reference correct PK in projects table
            $table->foreignId('project_id')
                ->nullable()
                ->constrained('projects', 'id') // since your projects table uses default "id"
                ->nullOnDelete();

            $table->enum('status', ['draft', 'submitted', 'in_progress', 'completed', 'cancelled'])
                ->default('draft');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('created_at');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
