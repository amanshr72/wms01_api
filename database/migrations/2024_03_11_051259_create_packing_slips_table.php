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
        Schema::create('packing_slips', function (Blueprint $table) {
            $table->id();
            $table->string('branch_code', 100)->nullable();
            $table->string('party_order_no', 100)->nullable();
            $table->string('ps_prefix', 100)->nullable();
            $table->string('godown_name', 100)->nullable();
            $table->string('remarks')->nullable();
            $table->string('box_no_prefix', 100)->nullable();
            /* Columns to save API Resp */
            $table->string('Status', 10)->nullable();
            $table->longText('Message')->nullable();
            $table->string('LastSavedDocNo', 10)->nullable();
            $table->string('LastSavedCode', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packing_slips');
    }
};
