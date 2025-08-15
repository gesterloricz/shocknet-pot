<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('finishing_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_name', 100);
            $table->string('option_code', 50)->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }
    public function down(): void {
        Schema::dropIfExists('finishing_options');
    }
};
