<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ppes', function (Blueprint $table) {
            $table->string('status')->nullable()->after('condition'); // Add the column
        });
    }
    
    public function down()
    {
        Schema::table('ppes', function (Blueprint $table) {
            $table->dropColumn('status'); // Rollback action
        });
    }
    
};
