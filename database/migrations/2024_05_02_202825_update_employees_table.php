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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('department');
            $table->string('position');
            $table->string('username');
            $table->text('password')->nullable();
            $table->longText('address');
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
        $table->dropColumn('first_name');
        $table->dropColumn('last_name');
        $table->dropColumn('phone');
        $table->dropColumn('email');
        $table->dropColumn('department');
        $table->dropColumn('position');
        $table->dropColumn('username');
        $table->dropColumn('password');
        $table->dropColumn('address');
        $table->dropColumn('string');
    });
    }
};
