<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsMessagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->longText('message');
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('contact_us_messages', function (Blueprint $table) {
            $table->foreign('client_id')->on('clients')->references('id')
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
        Schema::drop('contact_us_messages');
    }
}
