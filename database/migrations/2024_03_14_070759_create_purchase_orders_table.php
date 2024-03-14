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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('Vouch_Code', 10)->nullable();
            $table->string('Order_Prefix')->nullable();
            $table->integer('Order_Number')->nullable();
            $table->date('Order_Date')->nullable();
            $table->string('Party_Name')->nullable();
            $table->string('Party_User_Code')->nullable();
            $table->string('Agent_Name')->nullable();
            $table->string('Branch_Name')->nullable();
            $table->string('Branch_Short_Name')->nullable();
            $table->integer('Branch_Code')->nullable();
            $table->decimal('Exchange_Rate', 10, 2)->default(0.00);
            $table->string('Currency_Name')->nullable();
            $table->decimal('Order_Amount', 10, 2)->default(0.00);
            $table->decimal('Total_Tax', 10, 2)->default(0.00);
            $table->decimal('Net_Order_Amount', 10, 2)->default(0.00);
            $table->string('Supplier_Order_No')->nullable();
            $table->date('Delivery_Date')->nullable();
            $table->string('Quotation_No')->nullable();
            $table->string('Transfer_Branch_Name')->nullable();
            $table->integer('Transfer_Branch_Code')->nullable();
            $table->date('Quotation_Date')->nullable();
            $table->string('Action_Code', 100)->nullable();
            $table->string('Remarks')->nullable();
            $table->string('Tax_Region')->nullable();
            $table->date('Valid_Till_Date')->nullable();
            $table->string('Delivery_Add_1')->nullable();
            $table->string('Delivery_Add_2')->nullable();
            $table->string('Delivery_Add_3')->nullable();
            $table->string('Delivery_At')->nullable();
            $table->decimal('Total_Other_Val_1', 10, 2)->default(0.0);
            $table->decimal('Total_Other_Val_2', 10, 2)->default(0.0);
            $table->decimal('Total_Other_Val_3', 10, 2)->default(0.0);
            $table->decimal('Total_Other_Val_4', 10, 2)->default(0.0);
            $table->decimal('Total_Other_Val_5', 10, 2)->default(0.0);
            $table->decimal('Total_Other_Val_6', 10, 2)->default(0.0);
            $table->decimal('Total_Other_Val_7', 10, 2)->default(0.0);
            $table->string('Company_Name')->nullable();
            $table->string('Transport_Name')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
};
