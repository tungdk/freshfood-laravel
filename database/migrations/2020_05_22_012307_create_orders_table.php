<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0)->index();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('discount_id');
            // $table->foreign('discount_id')->references('id')->on('discounts');
            $table->integer('status')->default(1); // 1 là tiếp nhận , 2 đang vận chuyển , 3 là đã vận chuyển , -1 là hủy
            $table->integer('type')->default(1)->comment('1 thanh toán thường, 2 thanh toán onl');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->double('total');
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
        Schema::dropIfExists('orders');
    }
}
