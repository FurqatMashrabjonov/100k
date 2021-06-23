<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->text('description');
            $table->unsignedDecimal('price', 10, 0);
            $table->integer('like');
            $table->unsignedInteger('user_id');
            $table->string('token');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger("count")->default(0);
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('status_id')->references('id')->on('statuses');
//            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
