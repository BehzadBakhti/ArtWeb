<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('detail');
            $table->text('description');
            $table->string('dimension');
            $table->string('material');
            $table->bigInteger('product_category_id')->unsigned()->index();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->bigInteger('defult_img_id')->nullable();
            $table->integer('stock');
            $table->double('price');
            $table->double('discount')->nullable();
            
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
