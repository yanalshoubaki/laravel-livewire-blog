<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsermetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users_meta', function (Blueprint $table) {
            $table->increments('meta_id')->nullable(false);
            $table->integer('user_id')->nullable(false)->unsigned();;
            $table->string('meta_key')->nullable(false);
            $table->string('meta_value')->nullable(true);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_users_meta');
    }
}
