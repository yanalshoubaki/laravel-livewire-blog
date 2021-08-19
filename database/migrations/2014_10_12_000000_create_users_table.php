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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('user_email')->unique();
            $table->string('password');
            $table->text('bio')->nullable();
            $table->string('photo')->default('https://cdn.devdojo.com/users/July2021/yanalshoubaki233.jpg');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_active')->default(1);
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
