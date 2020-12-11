<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTypeClientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_type_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blood_type_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('blood_type_clients', function (Blueprint $table) {

            $table->foreign('client_id')->on('clients')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('blood_type_id')->on('blood_types')->references('id')
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
        Schema::drop('blood_type_clients');
    }
}
