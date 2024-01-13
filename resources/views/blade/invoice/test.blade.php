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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('cst')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('manager_type')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('invoice_date')->nullable();
            // $table->string('car_klo')->nullable();
            // $table->string('serial_number')->nullable();

            // $table->string('tid')->nullable();
            // $table->date('invoicedate')->nullable();
            $table->string('notes')->nullable();
            $table->string('total')->nullable();

            $table->softDeletes();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};



