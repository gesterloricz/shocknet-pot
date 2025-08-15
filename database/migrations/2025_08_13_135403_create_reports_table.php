<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_name');
            $table->enum('report_type', ['monthly', 'client', 'project', 'custom']);
            $table->date('report_period_start')->nullable();
            $table->date('report_period_end')->nullable();
            $table->enum('status', ['generating', 'ready', 'failed'])->default('generating');
            $table->string('file_path', 500)->nullable();
            $table->string('generated_by', 100)->nullable();
            $table->timestamp('generated_at')->useCurrent();
            $table->json('parameters')->nullable();

            $table->index('report_type');
            $table->index('status');
            $table->index('generated_at');
        });
    }
    public function down(): void {
        Schema::dropIfExists('reports');
    }
};
