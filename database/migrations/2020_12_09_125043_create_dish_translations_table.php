<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->constrained('dishes');
            $table->string('locale')->index();

            $table->string('info')->nullable();
            $table->string('name');
            $table->string('main_ingredients')->nullable();

            $table->unique(['dish_id','locale']);
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
        Schema::dropIfExists('dish_translations');
    }
}
