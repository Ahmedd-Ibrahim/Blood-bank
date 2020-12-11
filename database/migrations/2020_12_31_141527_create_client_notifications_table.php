<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientNotificationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('client_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('is_seen',['true','false']);
            $table->integer('client_id')->unsigned();
            $table->integer('notification_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('client_notifications', function (Blueprint $table) {

            $table->foreign('client_id')->on('clients')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('notification_id')->on('notifications')->references('id')
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
        Schema::drop('client_notifications');
    }
}
