<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('booking_slots', function (Blueprint $table) {
//            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('CASCADE')->onDelete('CASCADE');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('booking_slots', function (Blueprint $table) {
//            $table->dropForeign('booking_id');
//        });
    }
}
