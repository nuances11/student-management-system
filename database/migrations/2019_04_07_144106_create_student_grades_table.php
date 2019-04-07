<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_year_id');
            $table->integer('grade_id');
            $table->integer('section_id');
            $table->integer('user_id');
            $table->integer('student_id');
            $table->integer('first_period');
            $table->integer('second_period');
            $table->integer('third_period');
            $table->integer('fourth_period');
            $table->integer('final_rating');
            $table->integer('remarks');
            $table->integer('eligibility');
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
        Schema::dropIfExists('student_grades');
    }
}

