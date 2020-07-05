<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul',255);
            $table->text('isi')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('tag',150)->nullable();
            $table->timestamp('created_date')->nullable();
            $table->timestamp('modified_date')->nullable();
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
