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
        Schema::table('tab_product_slot', function (Blueprint $table) {
            $table->integer('slot')->nullable();
            $table->date('date')->nullable();
            $table->string('adddress')->nullable();
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_product_slot', function (Blueprint $table) {
            //
        });
    }
};
