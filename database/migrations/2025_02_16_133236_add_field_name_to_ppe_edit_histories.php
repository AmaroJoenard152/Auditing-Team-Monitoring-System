<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->string('field_name')->after('ppe_id'); // Adding 'field_name' column
        });
    }

    public function down()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->dropColumn('field_name'); // Rollback if needed
        });
    }
};

