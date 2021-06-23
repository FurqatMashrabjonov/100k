<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable()->default(null);
            $table->string("last_name")->nullable()->default(null);
            $table->string('email')->unique();
            $table->string("phone")->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer("phone_token")->nullable()->default(null);
            $table->boolean("is_admin")->default(false);
            $table->unsignedInteger("city_id")->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string("address")->nullable()->default(null);
            $table->boolean("is_completed")->default(false);
            $table->string("token")->default('')->nullable();
            $table->string("balance")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
