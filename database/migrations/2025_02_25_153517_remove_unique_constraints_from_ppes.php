<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Use raw SQL to check if the index exists, then drop it
        $indexExists = DB::select("
            SELECT COUNT(*) as count
            FROM information_schema.statistics
            WHERE table_schema = DATABASE()
              AND table_name = 'ppes'
              AND index_name = 'ppes_old_pn_unique'
        ");

        if ($indexExists[0]->count > 0) {
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
