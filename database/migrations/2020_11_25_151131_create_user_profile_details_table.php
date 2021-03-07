<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('profession');
            $table->string('gender');
            $table->date('birthday');
            $table->string('city');
            $table->text('about');
            $table->string('education');
            $table->string('studied_at');
            $table->string('work_status');
            $table->string('current_work');
            $table->string('previous_work');
            $table->string('phone_no');
            $table->string('speciality')->nullable();
            $table->string('skills')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();

            $table->mediumtext('work_adress');
            $table->string('profile_pic')->default("noimage.jpg");
            $table->string('profile_varified')->default("no");
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
        Schema::dropIfExists('user_profile_details');
    }
}
