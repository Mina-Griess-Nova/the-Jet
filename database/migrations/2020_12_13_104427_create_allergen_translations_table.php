<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('allergen_id')->constrained('allergens');
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['allergen_id','locale']);

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
        Schema::dropIfExists('allergen_translations');
    }
}
