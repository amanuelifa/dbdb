<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('employee_id')->unique();
            $table->string('job_title');
            $table->string('department');
            $table->string('phone_no');
            $table->string('email')->unique();
            $table->string('office');
            $table->timestamps();

            // Foreign key to the users table
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
