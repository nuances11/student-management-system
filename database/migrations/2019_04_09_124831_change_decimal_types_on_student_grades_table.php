<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDecimalTypesOnStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_grades', function (Blueprint $table) {
            $table->decimal('first_period', 5, 2)->change();
                $table->decimal('second_period', 5, 2)->change();
                $table->decimal('third_period', 5, 2)->change();
                $table->decimal('fourth_period', 5, 2)->change();
                $table->decimal('final_rating', 5, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_grades', function (Blueprint $table) {
            //
        });
    }
}
