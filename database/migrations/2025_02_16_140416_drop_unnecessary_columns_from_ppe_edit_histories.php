<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            if (Schema::hasColumn('ppe_edit_histories', 'field_changed')) {
                $table->dropColumn('field_changed');
            }
            if (Schema::hasColumn('ppe_edit_histories', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
            if (Schema::hasColumn('ppe_edit_histories', 'updated_by')) {
                $table->dropColumn('updated_by');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->string('field_changed', 255)->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();

            // Only add 'updated_at' instead of full timestamps() to avoid duplicate 'created_at'
            if (!Schema::hasColumn('ppe_edit_histories', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
};
