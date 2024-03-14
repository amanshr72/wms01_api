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
        Schema::create('get_delivery_orders', function (Blueprint $table) {
            $table->id();
            $table->string('Doc_Type')->nullable();
            $table->integer('Doc_Code')->nullable();
            $table->string('Doc_Prefix')->nullable();
            $table->integer('Doc_Number')->nullable();
            $table->string('DO_Date')->nullable();
            $table->integer('DO_Branch_Code')->nullable();
            $table->string('PartyUserCode')->nullable();
            $table->integer('SO_Head_Code')->nullable();
            $table->string('SO_No')->nullable();
            $table->string('SO_Date')->nullable();
            $table->string('Customer_Name')->nullable();
            $table->string('SO_Delivery_Date')->nullable();
            $table->string('Action_Code')->nullable();
            $table->string('Logic_User_Name')->nullable();
            $table->string('CurrencyName')->nullable();
            $table->decimal('ExchangeRate', 10, 2)->nullable();
            $table->integer('PickListDocCode')->nullable();
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
        Schema::dropIfExists('get_delivery_orders');
    }
};
