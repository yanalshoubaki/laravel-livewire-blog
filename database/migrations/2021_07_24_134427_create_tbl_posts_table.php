<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->integer('category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->string('post_title');
            $table->text('post_content');
            $table->integer('author_id');
            $table->string('post_slug');
            $table->string('post_image');
            $table->integer('post_status');

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
        Schema::dropIfExists('tbl_posts');
    }
}
