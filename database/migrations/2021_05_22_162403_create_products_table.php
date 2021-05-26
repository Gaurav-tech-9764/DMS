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
            $table->bigIncrements('id');
            $table->string('Product_Name', 100);
            $table->longText('Product_description');
            $table->unsignedBigInteger('Category_id');
            $table->foreign('Category_id')->references('id')->on('category')->onDelete('cascade');            ;
            $table->decimal('product_price', 8, 2);
            $table->mediumText('product_image');
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
