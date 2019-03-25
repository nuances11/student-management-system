<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lrn');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->string('sex');
            $table->string('dob');
            $table->string('mother_toung');
            $table->string('ethnic_group');
            $table->string('religion');
            $table->string('address_street');
            $table->string('address_barangay');
            $table->string('address_municipality');
            $table->string('address_province');
            $table->string('parent_father');
            $table->string('parent_mother');
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
        Schema::dropIfExists('students');
    }
}

