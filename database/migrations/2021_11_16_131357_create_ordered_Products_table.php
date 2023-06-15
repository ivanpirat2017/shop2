<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('orders_id')->constrained('orders')->cascadeOnDelete();
            $table->integer('status')->nullable()->default(0);
            $table->date('delivery')->nullable();
            $table->date('creating_product')->nullable()->default(date("Y-m-d H:i:s",strtotime('+3 hours')));
            $table->integer('count');
            $table->integer('price');
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
        Schema::dropIfExists('ordered_products');
    }
}
