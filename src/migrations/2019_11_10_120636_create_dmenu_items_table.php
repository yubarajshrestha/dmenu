<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmenu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dmenu_id')->nullable();
            $table->foreign('dmenu_id')->references('id')->on('dmenus')->onDelete('cascade');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('link')->nullable();
            $table->string('target')->default('_self');
            $table->json('parameters')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order');
            $table->boolean('enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dmenu_items');
    }
}
