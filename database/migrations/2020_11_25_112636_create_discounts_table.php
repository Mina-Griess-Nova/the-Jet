<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('dishes')->nullable();
            $table->string('cusines')->nullable();
            $table->string('cooks')->nullable();
            $table->string('sections')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('total');
            $table->date('activate_from')->nullable();;
            $table->date('activate_to')->nullable();;
            $table->string('uses')->nullable();
            $table->string('orders')->nullable();
            $table->string('customers')->nullable();
            $table->string('discount');
            $table->string('discount_type');
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
        Schema::dropIfExists('discounts');
    }
}
