<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('order_uuid')->unique();
            $table->string('phone')->unique();
            $table->timestamp("date")->default(DB::raw('NOW()'));
            $table->foreignId("user_id")->references("id")->on("users");
            $table->foreignId("status_id")->references("id")->on("order_status");
            $table->string("address");
            $table->text("note")->nullable()->default(null);
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
