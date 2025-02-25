<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPpeIdForeignKeyToPpeEditHistories extends Migration
{
    public function up()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            // Check if the 'ppe_id' column exists before attempting to add it
            if (!Schema::hasColumn('ppe_edit_histories', 'ppe_id')) {
                $table->bigInteger('ppe_id')->unsigned();
            }

            // Add the foreign key constraint
            $table->foreign('ppe_id')->references('id')->on('ppes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            // Drop the foreign key constraint and column
            $table->dropForeign(['ppe_id']);
            $table->dropColumn('ppe_id');
        });
    }
}
