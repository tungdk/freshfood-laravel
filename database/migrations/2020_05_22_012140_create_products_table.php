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
            $table->string('name');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->unsignedBigInteger('publisher_id');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->integer('number')->default(0);// khối lượng trên 1 sản phẩm
            $table->integer('qty')->default(0);
            $table->double('price')->default(0);
            $table->double('price_entry')->default(0)->comment('Giá nhập');
            $table->double('sale')->nullable()->default(0);
            $table->integer('status')->default(1);
            $table->integer('hot')->default(0);
            $table->integer('pay')->default(0);// số lượng lượt mua
            $table->integer('review_total')->default(0);// tong review cua san pham
            $table->integer('review_star')->default(0);// số lượng view
            $table->string('picture')->nullable();
            $table->text('info');
            $table->mediumText('description')->nullable();
            $table->boolean('is_delete')->default(false);
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
