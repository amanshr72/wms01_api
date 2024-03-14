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
        Schema::create('get_p_u_challan_returns', function (Blueprint $table) {
            $table->id();
            $table->string('Vouch_Code')->nullable();
            $table->string('Vouch_No')->nullable();
            $table->string('Vouch_Date')->nullable();
            $table->string('Account_Code')->nullable();
            $table->string('Account_Name')->nullable();
            $table->string('Agent_Name')->nullable();
            $table->decimal('Quantity', 10, 3)->nullable();
            $table->decimal('Gross_Amount', 10, 3)->nullable();
            $table->decimal('Net_Amount', 10, 3)->nullable();
            $table->decimal('Total_Tax', 10, 3)->nullable();
            $table->string('Branch_Name')->nullable();
            $table->integer('Branch_Code')->nullable();
            $table->string('Currency_Name')->nullable();
            $table->string('Bill_No')->nullable();
            $table->string('Bill_Date')->nullable();
            $table->string('GRN_Prefix')->nullable();
            $table->integer('GRN_Number')->nullable();
            $table->string('Tax_Region_Name')->nullable();
            $table->string('Action_Code')->nullable();
            $table->string('Doc_Type_Desc')->nullable();
            $table->string('Doc_Type')->nullable();
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
        Schema::dropIfExists('get_p_u_challan_returns');
    }
};
