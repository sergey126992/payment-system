<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id');
            $table->integer('amount');
            $table->string('phone');
            $table->string('description')->nullable();
            $table->string('external_id')->nullable();
            $table->string('success_message')->nullable();
            $table->string('custom_data')->nullable();
            $table->string('signature');
            $table->string('status')->default('created')->nullable();
            $table->boolean('status_change')->default(true)->nullable();
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
        Schema::dropIfExists('payments');
    }
}
