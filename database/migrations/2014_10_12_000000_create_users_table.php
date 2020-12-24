<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->time('work_from')->nullable();
            $table->time('work_to')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('images')->nullable();
            $table->text('info')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('password');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->integer('commission')->nullable();
            $table->text('commission_type')->nullable();
            $table->string('contract')->nullable();
            $table->tinyInteger('availability')->default('0');
            $table->tinyInteger('VIP')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
