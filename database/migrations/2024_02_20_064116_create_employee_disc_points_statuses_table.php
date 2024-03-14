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
        Schema::create('employee_disc_points_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('StatusCode')->nullable();
            // $table->text('Message')->nullable();
            $table->integer('SchemeCode')->nullable();
            $table->text('SchemeName')->nullable();
            $table->double('YearLimit')->nullable();
            $table->double('MonthLimit')->nullable();
            $table->double('BillLimit')->nullable();
            $table->double('YearLimitUsed')->nullable();
            $table->double('MonthLimitUsed')->nullable();
            $table->double('YearBalance')->nullable();
            $table->double('MonthBalance')->nullable();
            $table->double('DiscP')->nullable();
            $table->longText('LstCompGroupDisc')->nullable();
            $table->boolean('Status')->nullable();
            $table->text('Message')->nullable();
            $table->integer('LastSavedCode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_disc_points_statuses');
    }
};
