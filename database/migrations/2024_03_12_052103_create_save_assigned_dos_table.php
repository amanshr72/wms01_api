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
        Schema::create('save_assigned_dos', function (Blueprint $table) {
            $table->id();
            $table->integer('Doc_Code')->nullable();
            $table->string('Doc_Prefix', 15)->nullable();
            $table->decimal('Doc_Number', 10, 2)->nullable();
            $table->integer('DO_Branch_Code')->nullable();
            /* Columns to save API Resp */
            $table->string('Status', 10)->nullable();
            $table->longText('Message')->nullable();
            $table->string('LastSavedDocNo', 10)->nullable();
            $table->string('LastSavedCode', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_assigned_dos');
    }
};
