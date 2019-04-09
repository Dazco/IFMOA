<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->dateTime('last_seen')->default(now());
            $table->text('registration_number')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('othernames')->nullable();
            $table->text('address');
            $table->text('phone');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('state_of_origin')->nullable();
            $table->string('company_name');
            $table->text('company_address');
            $table->string('job_title');
            $table->text('nature_of_work');
            $table->integer('is_admin')->default(0);
            $table->integer('is_approved')->default(0);
            $table->integer('is_active')->default(0);
            $table->integer('grade_id')->default(1);
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
