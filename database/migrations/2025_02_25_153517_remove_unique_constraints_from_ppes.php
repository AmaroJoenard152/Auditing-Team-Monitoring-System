<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        // Only drop the unique index if Doctrine knows about it
        $sm      = Schema::getConnection()->getDoctrineSchemaManager();
        $indexes = $sm->listTableIndexes('ppes');

        if (array_key_exists('ppes_old_pn_unique', $indexes)) {
            Schema::table('ppes', function (Blueprint $table) {
                $table->dropUnique('ppes_old_pn_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::table('ppes', function (Blueprint $table) {
            $table->unique('old_pn', 'ppes_old_pn_unique');
        });
    }
};

