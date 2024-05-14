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
        Schema::create('departments_positions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('position_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments_positions');
    }
};
