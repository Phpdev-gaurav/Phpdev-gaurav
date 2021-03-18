<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('phone_number__id')->nullable()->default(null);
            $table->longText('body');
            $table->boolean('is_incoming')->default(0);
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
        Schema::dropIfExists('text_message');
    }
}
