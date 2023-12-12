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
        Schema::create('tab_users', function (Blueprint $table) {
            $table->id();
            $table->tinyText('f_name')->nullable();
            $table->tinyText('l_name')->nullable();
            $table->tinyText('email')->unique();
            $table->tinyText('contact')->nullable();
            $table->tinyText('u_name')->nullable();
            $table->tinyText('password')->nullable();
            $table->tinyInteger('id_authentication')->nullable();
            $table->tinyInteger('id_customers')->nullable();
            $table->tinyText('status')->nullable();
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
        Schema::dropIfExists('tab_users');
    }
};
