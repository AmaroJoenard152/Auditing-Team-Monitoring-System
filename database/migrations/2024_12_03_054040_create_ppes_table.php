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
        Schema::create('ppes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('division')->notNull();
            $table->string('user')->notNull();
            $table->string('property_type')->notNull();
            $table->string('article_item')->notNull();
            $table->string('description')->notNull();
            $table->string('old_pn')->not_null()->unique();
            $table->string('new_pn')->not_null()->unique();
            $table->string('unit_meas')->notNull();
            $table->string('unit_value')->notNull();
            $table->string('quantity_property')->notNull();
            $table->string('quantity_physical')->notNull();
            $table->string('location')->notNull();
            $table->string('condition')->notNull();
            $table->string('remarks')->notNull();
            $table->date('date_acq')->notNull();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppes');
    }
};
