<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeRemarksNullableInPpesTable extends Migration
{
    public function up()
    {
        Schema::table('ppes', function (Blueprint $table) {
            $table->string('remarks')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('ppes', function (Blueprint $table) {
            $table->string('remarks')->nullable(false)->change();
        });
    }
}
