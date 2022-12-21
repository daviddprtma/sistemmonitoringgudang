<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitsidColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('units_id');
            $table->foreign('units_id')->references('id')->on('items');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['units_id']);
            $table->dropColumn(['units_id']);
            // $table->timestamps();
        });
    }
}
