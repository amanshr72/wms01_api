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
        Schema::create('get_stock_in_hands', function (Blueprint $table) {
            $table->id();
            $table->integer('Branch_Code')->nullable();
            $table->string('Branch_Name')->nullable();
            $table->string('Bin_Name')->nullable();
            $table->integer('Bin_Number')->nullable();
            $table->string('Godown_Name')->nullable();
            $table->string('LogicUserCode')->nullable();
            $table->string('AddlItemCode')->nullable();
            $table->string('Item_Name')->nullable();
            $table->string('Shade_Name')->nullable();
            $table->string('Pack_Name')->nullable();
            $table->string('Lot_Number')->nullable();
            $table->integer('Lot_Code')->nullable();
            $table->string('Packing')->nullable();
            $table->decimal('Stock_Qty', 10, 2)->nullable();
            $table->decimal('Lot_Sale_Rate', 10, 2)->nullable();
            $table->decimal('Lot_Basic_Rate', 10, 2)->nullable();
            $table->decimal('Lot_MRP', 10, 2)->nullable();
            $table->decimal('Lot_SPRate1', 10, 2)->nullable();
            $table->decimal('Item_Sale_Rate', 10, 2)->nullable();
            $table->decimal('Item_MRP', 10, 2)->nullable();
            $table->decimal('Carton_Stock', 10, 2)->nullable();
            $table->integer('Godown_Code')->nullable();
            $table->integer('Item_Cf_1')->nullable();
            $table->integer('Item_Cf_2')->nullable();
            $table->integer('Item_Cf_3')->nullable();
            $table->date('Lot_Pur_Date')->nullable();
            $table->date('Lot_Expiry_Date')->nullable();
            $table->string('Status', 10)->nullable();
            $table->longText('Message')->nullable();
            $table->string('LastGlobalModifyCode', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_stock_in_hands');
    }
};
