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
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->string('Branch_Short_Name')->nullable();
            $table->integer('Branch_Code')->nullable();
            $table->string('Order_Prefix', 15)->nullable();
            $table->dateTime('Order_Date')->nullable();
            $table->integer('Party_User_code')->nullable();
            $table->string('Party_Order_No', 100)->nullable();
            $table->string('External_Order_ID')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('Tax_Region')->nullable();
            $table->string('RCU_Mem_Prefix', 8)->nullable();
            $table->string('RCU_Mem_Number')->nullable();
            $table->string('RCU_Mobile_No', 10)->nullable();
            $table->string('RCU_Email', 50)->nullable();
            $table->string('RCU_First_Name', 50)->nullable();
            $table->string('RCU_Last_Name', 50)->nullable();
            $table->string('RCU_State', 50)->nullable();
            $table->string('RCU_PinCode', 10)->nullable();
            $table->string('RCU_Country', 50)->nullable();
            $table->string('RCU_City', 50)->nullable();
            $table->string('Billing_FirstName', 50)->nullable();
            $table->string('Billing_MiddleName', 50)->nullable();
            $table->string('Billing_LastName', 50)->nullable();
            $table->string('Billing_MobileNo', 10)->nullable();
            $table->string('Billing_EmailID', 50)->nullable();
            $table->string('Billing_Address1', 200)->nullable();
            $table->string('Billing_Address2', 200)->nullable();
            $table->string('Billing_Country', 60)->nullable();
            $table->string('Billing_State', 60)->nullable();
            $table->string('Billing_City', 60)->nullable();
            $table->string('Billing_PinCode', 60)->nullable();
            $table->string('Billing_ContactPerson', 80)->nullable();
            $table->string('Shipping_FirstName', 50)->nullable();
            $table->string('Shipping_MiddleName', 50)->nullable();
            $table->string('Shipping_LastName', 50)->nullable();
            $table->string('Shipping_MobileNo', 10)->nullable();
            $table->string('Shipping_EmailID', 50)->nullable();
            $table->string('Shipping_Address1', 200)->nullable();
            $table->string('Shipping_Address2', 200)->nullable();
            $table->string('Shipping_Country', 50)->nullable();
            $table->string('Shipping_State', 50)->nullable();
            $table->string('Shipping_City', 50)->nullable();
            $table->string('Shipping_PinCode', 60)->nullable();
            $table->string('Shipping_ContactPerson', 100)->nullable();
            $table->string('Payment_Method')->nullable();
            $table->dateTime('Exfactory_Date')->nullable();
            $table->dateTime('Delivery_Date')->nullable();
            $table->decimal('Total_Other_Val_1', 10, 2)->nullable();
            $table->decimal('Total_Other_Val_2', 10, 2)->nullable();
            $table->decimal('Total_Other_Val_3', 10, 2)->nullable();
            $table->decimal('Total_Other_Val_4', 10, 2)->nullable();
            $table->decimal('Total_Other_Val_5', 10, 2)->nullable();
            $table->decimal('Total_Other_Val_6', 10, 2)->nullable();
            $table->decimal('Total_Other_Val_7', 10, 2)->nullable();
            $table->string('Indirect_Customer_User_Code')->nullable();
            $table->string('Agent_Name')->nullable();
            $table->string('Company_Name')->nullable();
            $table->string('Transport_Name')->nullable();
            $table->integer('Order_Type')->nullable();
            $table->dateTime('Party_Order_Date')->nullable();
            $table->longText('AdvanceEntry')->nullable();
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
        Schema::dropIfExists('save_sale_orders');
    }
};
