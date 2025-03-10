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
            // Change 'quantity_property' column to integer
            $table->integer('quantity_property')->change();
            
            // Change 'quantity_physical' column to integer
            $table->integer('quantity_physical')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('ppes', function (Blueprint $table) {
            // Change 'quantity_property' back to varchar(255)
            $table->string('quantity_property', 255)->change();
            
            // Change 'quantity_physical' back to varchar(255)
            $table->string('quantity_physical', 255)->change();
        });
    }
};
