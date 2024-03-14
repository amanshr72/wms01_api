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
        Schema::create('save_assigned_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('save_assigned_id')->index();
            $table->integer('DO_Txn_Code');
            $table->string('AddlItemCode');
            $table->string('LogicUser_Code');
            $table->string('Packing_Box_No', 30);
            $table->integer('Quantity');
            $table->decimal('MRP', 10, 2);
            $table->decimal('Lot_MRP', 10, 2);
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
        Schema::dropIfExists('save_assigned_list_items');
    }
};
