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
            $table->string('forward_id');
            $table->string('name');
            $table->string('type');
            $table->integer('stock');
            $table->string('color');
            $table->float('price');
            $table->string('material');
            $table->integer('rating');
            $table->integer('sales');
            $table->string('image');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();

            $table->index(['color', 'material']);
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
