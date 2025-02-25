<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->renameColumn('old_value', 'previous_value');
            $table->renameColumn('new_value', 'updated_value');
            $table->renameColumn('created_at', 'edited_at'); // If you prefer `edited_at`
        });
    }

    public function down()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->renameColumn('previous_value', 'old_value');
            $table->renameColumn('updated_value', 'new_value');
            $table->renameColumn('edited_at', 'created_at'); // Revert if necessary
        });
    }
};
