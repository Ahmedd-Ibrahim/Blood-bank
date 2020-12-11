<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->longText('content');
            $table->integer('donation_order_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

         Schema::table('notifications', function (Blueprint $table) {

             $table->foreign('donation_order_id')->on('donation_orders')->references('id')
                 ->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
    }
}
