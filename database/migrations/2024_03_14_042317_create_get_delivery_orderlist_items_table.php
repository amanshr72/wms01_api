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
        Schema::create('get_delivery_orderlist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_order_id')->index();
            $table->string('SO_No')->nullable();
            $table->string('SO_Date')->nullable();
            $table->integer('ItemDetCode')->nullable();
            $table->integer('DO_Txn_Code')->nullable();
            $table->string('AddlItemCode')->nullable();
            $table->string('LogicUser_Code')->nullable();
            $table->string('Packing_Box_No')->nullable();
            $table->decimal('Quantity', 10, 2)->nullable();
            $table->string('Packing')->nullable();
            $table->decimal('Packing_CF1', 10, 2)->nullable();
            $table->string('Packing_CF1_Desc')->nullable();
            $table->decimal('MRP', 10, 2)->nullable();
            $table->decimal('Lot_MRP', 10, 2)->nullable();
            $table->integer('BinCode')->nullable();
            $table->string('LastGlobalModifyCode', 10)->nullable();
            $table->string('Status')->nullable();
            $table->longText('Message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_delivery_orderlist_items');
    }
};
