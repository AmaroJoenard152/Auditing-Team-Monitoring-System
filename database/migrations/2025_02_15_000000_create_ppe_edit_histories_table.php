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
        Schema::create('ppe_edit_histories', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('ppe_id');
        $table->string('old_value')->nullable();       // Add this column if it's missing
        $table->string('new_value')->nullable();       // Also probably needed
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppe_edit_histories');
    }
};
