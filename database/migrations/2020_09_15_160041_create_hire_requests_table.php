<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHireRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sender_id');
            $table->integer('reciver_id');
            $table->string('content');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('city');
            $table->string('location');
            $table->string('subject');
            $table->string('detail');
            $table->string('assistance_type');
            $table->string('work_tenure');
            $table->string('request_status')->default('Awaiting');
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
        Schema::dropIfExists('hire_requests');
    }
}
