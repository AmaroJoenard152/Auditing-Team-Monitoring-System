<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddPpeIdForeignKeyToPpeEditHistories extends Migration
{
    public function up()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            // Do NOT try to re-add the column
            $table->foreign('ppe_id')
                ->references('id')
                ->on('ppes')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::table('ppe_edit_histories', function (Blueprint $table) {
            $table->dropForeign(['ppe_id']);
            $table->dropColumn('ppe_id');
        });
    }
}
