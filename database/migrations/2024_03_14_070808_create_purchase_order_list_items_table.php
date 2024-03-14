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
        Schema::create('purchase_order_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->index();
            $table->integer('Txn_Code');
            $table->string('Logic_UserCode');
            $table->string('Lot_Number')->nullable();
            $table->decimal('CF_Qty', 10, 2)->default(0.0);
            $table->decimal('Total_Qty', 10, 2)->default(0.0);
            $table->decimal('Pending_Qty', 10, 2)->default(0.0);
            $table->decimal('PO_MRP', 10, 2)->default(0.0);
            $table->string('AddlItemCode')->nullable();
            $table->integer('Order_Qty')->default(0);
            $table->decimal('Rate', 10, 2)->default(0.0);
            $table->decimal('SPCD_P', 10, 2)->default(0.0);
            $table->decimal('Tax_Amount', 10, 2)->default(0.0);
            $table->string('Remarks')->nullable();
            /* Columns to save API Resp */
            $table->string('Status')->nullable();
            $table->longText('Message')->nullable();
            $table->string('LastSavedDocNo', 10)->nullable();
            $table->string('LastSavedCode', 10)->nullable();
            $table->string('Order_No', 10)->nullable();
            $table->string('LastGlobalModifyCode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_list_items');
    }
};
