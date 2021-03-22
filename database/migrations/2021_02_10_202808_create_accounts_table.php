<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email")->unique();
            $table->string("username")->unique();
            $table->string("password");
            $table->foreignId("role_id")->references("id")->on("roles");
            $table->foreignId("status_id")->references("id")->on("account_status");
            $table->timestamp("registred")->default(DB::raw('NOW()'));
            $table->boolean("checked")->default(false);
        });

        $users = new \Database\Seeders\AccountSeeder();
        $users->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
