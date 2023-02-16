<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_details', function (Blueprint $table) {
            $table->id();
            $table->string('heading1')->nullable();
            $table->longText('detail1')->nullable();
            $table->string('heading2')->nullable();
            $table->longText('detail2')->nullable();
            $table->string('heading3')->nullable();
            $table->longText('detail3')->nullable();
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
        Schema::dropIfExists('slider_details');
    }
};
