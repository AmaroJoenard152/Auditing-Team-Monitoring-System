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
            $table->dropUnique(['old_pn']);
            $table->dropUnique(['new_pn']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppes', function (Blueprint $table) {
            $table->unique('old_pn');
            $table->unique('new_pn');
        });
    }
};
