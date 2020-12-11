<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientGovernoratesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_governorates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('governorate_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('client_governorates', function (Blueprint $table) {

            $table->foreign('client_id')->on('clients')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('governorate_id')->on('governorates')->references('id')
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
        Schema::drop('client_governorates');
    }
}
