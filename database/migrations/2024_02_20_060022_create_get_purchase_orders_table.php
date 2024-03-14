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
        Schema::create('get_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('Vouch_Code', 10)->nullable();
            $table->string('Order_Prefix', 50)->nullable();
            $table->string('Order_Number', 50)->nullable();
            $table->string('Order_Date', 10)->nullable();
            $table->string('Party_Name', 100)->nullable();
            $table->string('Party_User_Code', 10)->nullable();
            $table->string('Agent_Name', 50)->nullable();
            $table->string('Branch_Name', 50)->nullable();
            $table->string('Branch_Short_Name', 50)->nullable();
            $table->string('Exchange_Rate', 10)->nullable();
            $table->string('Currency_Name', 50)->nullable();
            $table->decimal('Order_Amount')->nullable();
            $table->decimal('Total_Tax')->nullable();
            $table->decimal('Net_Order_Amount')->nullable();
            $table->integer('Supplier_Order_No')->nullable();
            $table->string('Delivery_Date', 10)->nullable();
            $table->integer('Quotation_No')->nullable();
            $table->string('Transfer_Branch_Name', 100)->nullable();
            $table->string('Transfer_Branch_Code', 10)->nullable();
            $table->string('Quotation_Date', 20)->nullable();
            $table->string('Action_Code', 20)->nullable();
            $table->longText('ListItems')->nullable();
            $table->string('Status')->nullable();
            $table->text('Message')->nullable();
            $table->string('LastGlobalModifyCode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_purchase_orders');
    }
};
