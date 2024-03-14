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
        Schema::create('packing_slip_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('packing_slip_id')->index()->nullable();
            $table->string('item_code', 50)->nullable();
            $table->string('quantity', 10)->nullable();
            $table->longText('list_boxs')->nullable();
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
        Schema::dropIfExists('packing_slip_list_items');
    }
};
