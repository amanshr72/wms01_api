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
        Schema::create('stock_receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_masters_id')->index()->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('location')->nullable();
            $table->string('refrence_doc_no')->nullable();
            $table->string('refrence_date')->nullable();
            $table->string('user_prefix')->nullable();
            $table->string('item_desc')->nullable();
            $table->string('branch_code', 50)->nullable();
            $table->string('doc_prefix', 100)->nullable();
            $table->string('issued_to')->nullable();
            $table->string('godown_name')->nullable();
            $table->string('received_from')->nullable();
            $table->string('status')->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_receipts');
    }
};
