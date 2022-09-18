<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->bigInteger('category_id')->unsigned();
            //$table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('categories')->references('id')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
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
        Schema::dropIfExists('products');
    }
}