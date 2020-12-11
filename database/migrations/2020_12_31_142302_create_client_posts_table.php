<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('client_posts', function (Blueprint $table) {

            $table->foreign('client_id')->on('clients')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('post_id')->on('posts')->references('id')
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
        Schema::drop('client_posts');
    }
}
