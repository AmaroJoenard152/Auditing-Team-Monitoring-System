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
        Schema::table('ppes', function (Blueprint $table) {
            // Make the 'remarks' column nullable
            $table->string('remarks')->nullable()->change();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppes', function (Blueprint $table) {
            // Make the 'remarks' column NOT nullable
            $table->string('remarks')->nullable(false)->change();
        });
    }
    
};
