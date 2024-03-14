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
        Schema::create('get_sale_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('Vouch_Code', 10)->nullable();
            $table->string('Bill_No')->nullable();
            $table->string('New_Bill_No')->nullable();
            $table->string('Bill_Date')->nullable();
            $table->string('Bill_Time')->nullable();
            $table->string('Account_Code')->nullable();
            $table->string('Account_Name')->nullable();
            $table->string('Customer_Code')->nullable();
            $table->string('Customer_Name')->nullable();
            $table->string('Agent_Name')->nullable();
            $table->integer('Quantity',)->nullable();
            $table->integer('Gross_Amount')->nullable();
            $table->integer('Net_Amount')->nullable();
            $table->string('Total_Tax', 50)->nullable();
            $table->string('Branch_Name')->nullable();
            $table->string('Branch_Code', 10)->nullable();
            $table->string('Currency_Name')->nullable();
            $table->string('Tax_Region_Name')->nullable();
            $table->string('Action_Code')->nullable();
            $table->string('Type')->nullable();
            $table->string('Branch_Short_Name')->nullable();
            $table->string('Doc_Prefix')->nullable();
            $table->integer('Doc_Number')->nullable();
            $table->string('RCU_Membership_Series')->nullable();
            $table->integer('RCU_Membership_Number')->nullable();
            $table->string('Retail_Cust_Name')->nullable();
            $table->string('Retail_Cust_Mobile_No')->nullable();
            $table->string('Retail_Cust_Email_ID')->nullable();
            $table->string('SO_Order_No', 100)->nullable();
            $table->string('SO_Order_Date', 100)->nullable();
            $table->string('SO_Party_Order_No', 100)->nullable();
            $table->string('SO_Party_Order_Date', 100)->nullable();
            $table->string('Credit_Note_Bill_Amount', 100)->nullable();
            $table->string('Gr_Number', 100)->nullable();
            $table->string('Gr_Date', 100)->nullable();
            $table->string('Order_No', 100)->nullable();
            $table->string('Order_Date', 100)->nullable();
            $table->string('Remarks1', 100)->nullable();
            $table->string('Cases', 100)->nullable();
            $table->string('Transport_Mode', 100)->nullable();
            $table->string('DNParty_Name', 100)->nullable();
            $table->string('CNParty_Name', 100)->nullable();
            $table->string('DISPParty_Name', 100)->nullable();
            $table->string('HANDParty_Name', 100)->nullable();
            $table->string('POSTParty_Name', 100)->nullable();
            $table->string('DN_Desc', 100)->nullable();
            $table->string('CN_Desc', 100)->nullable();
            $table->string('Display_Desc', 100)->nullable();
            $table->string('Challan_Date', 100)->nullable();
            $table->string('Challan_no', 100)->nullable();
            $table->string('DD_Chq', 100)->nullable();
            $table->string('DD_Chq_No', 100)->nullable();
            $table->string('DD_Chq_Amt', 100)->nullable();
            $table->string('GR_Number_2', 100)->nullable();
            $table->string('GR_Date_2', 100)->nullable();
            $table->string('Issue_Time', 100)->nullable();
            $table->string('Removal_Time', 100)->nullable();
            $table->string('Trans_Name', 100)->nullable();
            $table->string('Remarks2', 100)->nullable();
            $table->string('Remarks3', 100)->nullable();
            $table->string('Credit_Note_Amount', 100)->nullable();
            $table->string('ST_Branch_Code', 100)->nullable();
            $table->string('RCU_Create_Date', 100)->nullable();
            $table->string('Credit_Amount', 100)->nullable();
            $table->string('Cash_Amount', 100)->nullable();
            $table->string('Gift_Voucher_Amount', 100)->nullable();
            $table->string('Discount_Coupon_No', 100)->nullable();
            $table->string('Discount_Coupon_Amt', 100)->nullable();
            $table->string('Bill_Cancelled', 100)->nullable();
            $table->string('GST_EInvoice_IRN_No', 100)->nullable();
            $table->string('GST_EInvoice_QR_Image', 100)->nullable();
            $table->string('GST_EInvoice_Acknowledgement_No', 100)->nullable();
            $table->string('GST_EInvoice_Acknowledgement_Date', 100)->nullable();
            $table->string('GST_EWay_Bill_No', 100)->nullable();
            $table->string('GST_EWay_Bill_Date', 100)->nullable();
            $table->string('InvoicePDFLink', 100)->nullable();
            $table->string('TCS_Act_Name', 100)->nullable();
            $table->string('TCS_Percent', 100)->nullable();
            $table->string('TCS_Amount', 100)->nullable();
            $table->string('Credit_Card_Amount', 100)->nullable();
            $table->longText('ListCreditCard');
            $table->longText('LstItems')->nullable();
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
        Schema::dropIfExists('get_sale_invoices');
    }
};
