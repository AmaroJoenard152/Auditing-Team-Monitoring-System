<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->dropColumn(['field_changed', 'updated_at', 'updated_by']);
        });
    }

    public function down(): void
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->string('field_changed', 255)->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps(); 
        });
    }
};

