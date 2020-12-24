<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('section_id')->nullable()->constrained('sections');
            $table->integer('available_count')->nullable();
            $table->string('cook_on')->nullable();
            $table->string('portions_available')->nullable();
            $table->string('portions_price')->nullable();
            $table->tinyInteger('available')->nullable();
            $table->integer('old_price')->nullable();
            $table->string('images');
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
        Schema::dropIfExists('dishes');
    }
}
