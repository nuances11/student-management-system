<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypesOnStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_grades', function (Blueprint $table) {
                $table->decimal('first_period', 3, 2)->change();
                $table->decimal('second_period', 3, 2)->change();
                $table->decimal('third_period', 3, 2)->change();
                $table->decimal('fourth_period', 3, 2)->change();
                $table->decimal('final_rating', 3, 2)->change();
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
