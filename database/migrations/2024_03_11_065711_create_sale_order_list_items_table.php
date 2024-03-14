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
        Schema::create('sale_order_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_order_id')->index();
            $table->string('LogicUser_Code')->nullable();
            $table->string('AddlItemCode')->nullable();
            $table->decimal('Order_Qty', 10, 2)->nullable();
            $table->decimal('Rate', 10, 2)->nullable();
            $table->decimal('CD_P', 10, 2)->nullable();
            $table->decimal('TD_P', 10, 2)->nullable();
            $table->decimal('SPCD_P', 10, 2)->nullable();
            $table->decimal('CD_Rs', 10, 2)->nullable();
            $table->decimal('Scheme_Item', 10, 2)->nullable();
            $table->decimal('Adjust_Item', 10, 2)->nullable();
            $table->decimal('Tax_Amount', 10, 2)->nullable();
            $table->string('Remarks')->nullable();
            $table->string('User_Column_1')->nullable();
            $table->string('User_Column_2')->nullable();
            $table->string('User_Column_3')->nullable();
            $table->string('User_Column_4')->nullable();
            $table->string('User_Column_5')->nullable();
            $table->string('Item_Order_ID')->nullable();
            /* Columns to save API Resp */
            $table->string('Status', 10)->nullable();
            $table->longText('Message')->nullable();
            $table->string('LastSavedDocNo', 10)->nullable();
            $table->string('LastSavedCode', 10)->nullable();
            $table->string('Order_No', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_order_list_items');
    }
};
