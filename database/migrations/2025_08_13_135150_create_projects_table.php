<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained('clients', 'client_id')
                ->cascadeOnDelete();
            $table->string('project_name');
            $table->text('project_description')->nullable();
            $table->enum('status', ['active', 'completed', 'on_hold', 'cancelled'])->default('active');
            $table->timestamps();

            $table->index('status');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
