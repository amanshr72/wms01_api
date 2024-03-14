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
        Schema::table('get_sale_orders', function (Blueprint $table) {
            // $table->id();
            // $table->string('Vouch_Code');
            // $table->string('Order_Prefix');
            // $table->string('Order_Number');
            // $table->string('Order_No');
            // $table->date('Order_Date');
            // $table->date('Valid_Date');
            // $table->string('Party_Name');
            // $table->string('Party_User_Code');
            // $table->string('Agent_Name');
            // $table->string('Branch_Code');
            // $table->string('Branch_Name');
            // $table->string('Branch_Short_Name');
            // $table->decimal('Exchange_Rate');
            // $table->string('Currency_Name');
            // $table->decimal('Order_Amount');
            // $table->decimal('Net_Order_Amount');
            // $table->string('Party_Order_No');
            // $table->string('Action_Code');
            // $table->longText('ListItems');
            // $table->string('Status');
            // $table->text('Message')->nullable();
            // $table->string('LastGlobalModifyCode');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('get_sale_orders', function (Blueprint $table) {
            // Schema::dropIfExists('get_sale_orders');
        });
    }
};
