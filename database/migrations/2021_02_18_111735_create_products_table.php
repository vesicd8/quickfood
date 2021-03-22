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
            $table->string("name")->unique();
            $table->foreignId("category_id")->nullable()->references("id")->on("categories");
            $table->foreignId("unit_id")->references("id")->on("units");
            $table->foreignId("label_id")->nullable()->references("id")->on("labels");
            $table->decimal("unit_value");
            $table->text("description");
            $table->text("src");
            $table->string("url")->unique();
            $table->boolean("active")->default(true);
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
