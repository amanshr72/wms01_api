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
        Schema::create('get_purchase_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('Vouch_Code', 10)->nullable();
            $table->string('Vouch_No', 100)->nullable();
            $table->string('Vouch_Date', 20)->nullable();
            $table->string('Account_Code', 10)->nullable();
            $table->string('Account_Name', 255)->nullable();
            $table->string('Agent_Name', 100)->nullable();
            $table->integer('Quantity')->nullable();
            $table->integer('Gross_Amount')->nullable();
            $table->integer('Net_Amount')->nullable();
            $table->integer('Total_Tax')->nullable();
            $table->string('Branch_Name', 100)->nullable();
            $table->integer('Branch_Code')->nullable();
            $table->string('Currency_Name', 50)->nullable();
            $table->string('Bill_No', 100)->nullable();
            $table->string('Bill_Date', 20)->nullable();
            $table->string('GRN_Prefix', 100)->nullable();
            $table->integer('GRN_Number')->nullable();
            $table->string('Tax_Region_Name', 100)->nullable();
            $table->string('Action_Code', 50)->nullable();
            $table->string('Doc_Type_Desc', 100)->nullable();
            $table->string('Doc_Type', 50)->nullable();
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
        Schema::dropIfExists('get_purchase_vouchers');
    }
};
