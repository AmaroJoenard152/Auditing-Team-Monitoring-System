<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->string('division')->nullable()->after('ppe_id');
            $table->string('user')->nullable()->after('division');
            $table->string('new_pn')->nullable()->after('user');
        });
    }

    public function down(): void
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->dropColumn(['division', 'user', 'new_pn']);
        });
    }
};
