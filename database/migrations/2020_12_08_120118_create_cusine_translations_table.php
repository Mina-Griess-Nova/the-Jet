<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCusineTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusine_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cusine_id')->constrained('cusines');
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['cusine_id','locale']);
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
        Schema::dropIfExists('cusine_translations');
    }
}
