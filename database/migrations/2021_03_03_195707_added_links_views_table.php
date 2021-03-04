<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedLinksViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links_views', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('link_id');
            $table->foreign('link_id')->references('id')->on('links');
            $table->string('user_agent');
            $table->string('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links_views');
    }
}
