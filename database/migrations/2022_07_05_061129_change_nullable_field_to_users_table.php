<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
           
            $table->string('owner_phone')->nullable()->change();
            $table->longText('owner_address')->nullable()->change();
            $table->string('username')->nullable()->change();
            $table->integer('gender')->nullable()->change();
            $table->longText('store_description')->nullable()->change();
            $table->integer('categories_id')->nullable()->change();
            $table->integer('store_status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
           
            $table->string('owner_phone')->nullable(false)->change();
            $table->longText('owner_address')->nullable(false)->change();
            $table->string('username')->nullable(false)->change();
            $table->integer('gender')->nullable(false)->change();
            $table->longText('store_description')->nullable(false)->change();
            $table->integer('categories_id')->nullable(false)->change();
            $table->integer('store_status')->nullable(false)->change();
        });
    }
}
