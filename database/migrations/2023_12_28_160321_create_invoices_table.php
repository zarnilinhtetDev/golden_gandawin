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

            $table->string('customer_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_date')->nullable();

            $table->string('payment_duedate')->nullable();
            // $table->string('consignment')->nullable();

            // test
            $table->string('total')->nullable();
            $table->string('discount_cash')->nullable();
            $table->string('commercial_text')->nullable();
            $table->string('super_total')->nullable();
            $table->string('paid')->nullable();
            $table->string('balance')->nullable();
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
