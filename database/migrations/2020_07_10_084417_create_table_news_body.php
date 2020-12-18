<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNewsBody extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_body', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('news_header_id');
            $table->foreign('news_header_id')->references('id')->on('news_header');
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('title',100);
            $table->text('body');
            $table->unsignedBigInteger('type_id');
            $table->string('logo_url',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_body');
    }
}
