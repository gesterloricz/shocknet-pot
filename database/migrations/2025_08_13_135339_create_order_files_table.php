<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('file_name');
            $table->string('file_path', 500);
            $table->bigInteger('file_size')->nullable();
            $table->string('file_type', 100)->nullable();
            $table->enum('file_status', ['print_ready', 'needs_prepress', 'requires_design_service'])->default('print_ready');
            $table->text('file_notes')->nullable();
            $table->timestamp('uploaded_at')->useCurrent();
        });
    }
    public function down(): void {
        Schema::dropIfExists('order_files');
    }
};
