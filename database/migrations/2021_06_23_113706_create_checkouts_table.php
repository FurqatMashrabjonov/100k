<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("region_id");
            $table->string("phone");
            $table->string("name");
            $table->unsignedInteger("referal_id")->default(null)->nullable();
            $table->string("address");
            $table->unsignedInteger("count");
            $table->decimal("amount", 10, 0)->nullable()->default(null);
            $table->unsignedInteger("product_id");
            $table->unsignedTinyInteger("status");
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
        Schema::dropIfExists('checkouts');
    }
}
