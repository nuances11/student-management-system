<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalDetailsToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('status')->after('parent_mother')->default('');
            $table->string('parent_mother_age')->after('parent_mother')->default('');
            $table->string('parent_mother_occupation')->after('parent_mother_age')->default('');
            $table->string('parent_father_age')->after('parent_father')->default('');
            $table->string('parent_father_occupation')->after('parent_father_age')->default('');
            $table->string('siblings')->after('parent_mother_age')->default('');
            $table->string('siblings_age')->after('siblings')->default('');
            $table->string('siblings_details')->after('siblings_age')->default('');
            $table->longText('goals')->after('siblings_details')->default('');
            $table->integer('has_card')->after('goals')->default(0);
            $table->integer('has_bc')->after('has_card')->default(0);
            $table->integer('has_others')->after('has_bc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}

