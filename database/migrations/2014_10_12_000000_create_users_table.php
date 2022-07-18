<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('username');
            $table->string('owner_phone');
            $table->longText('owner_address');
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('store_name');
            $table->longText('store_phone');
            $table->longText('store_address');
            $table->longText('store_description');
            $table->string('maps_store');
            $table->string('ktp_photo');
            $table->string('selfie_photo');
            $table->string('logo_store');
            $table->integer('categories_id');
            $table->integer('store_status');
            $table->string('slug');

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
