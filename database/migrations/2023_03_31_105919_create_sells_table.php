<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceid');

            $table->integer('customer_id')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_price')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('discount')->nullable();
            $table->string('foc')->nullable();
            // $table->string('total')->nullable();
            // $table->string('discount_cash')->nullable();
            // $table->string('commercial_text')->nullable();
            // $table->string('super_total')->nullable();
            // $table->string('paid')->nullable();
            // $table->string('balance')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
};
