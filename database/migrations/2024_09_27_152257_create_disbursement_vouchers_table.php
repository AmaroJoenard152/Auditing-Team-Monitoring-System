<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disbursement_vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month_')->not_null();
            $table->string('doc_')->not_null(); 
            $table->string('code_no')->not_null();
            $table->string('folder')->not_null();
            $table->string('account_no')->nullable();
            $table->string('radai')->nullable();
            $table->string('lddap')->nullable();
            $table->string('total_amount')->nullable();
            $table->date('date_received')->not_null();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursement_vouchers');
    }
};
