<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('discription');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->boolean('approved')->default(false);
            $table->boolean('Disapproved')->default(false);
            $table->date('approved_at')->nullable();
            $table->date('disapproved_at')->nullable();
            $table->string('image')->default('photos/fi-snsuxx-question-mark.png');
            $table->bigInteger('price')->default(0);
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
        Schema::dropIfExists('advertisements');
    }
}