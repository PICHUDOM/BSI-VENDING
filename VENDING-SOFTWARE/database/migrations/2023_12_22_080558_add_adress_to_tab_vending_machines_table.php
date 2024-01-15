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
        Schema::table('tab_vending_machines', function (Blueprint $table) {
            $table->string('province')->nullable();
            $table->string('districts')->nullable();
            $table->string('communes')->nullable();
            $table->string('villages')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_vending_machines', function (Blueprint $table) {
            //
        });
    }
};
