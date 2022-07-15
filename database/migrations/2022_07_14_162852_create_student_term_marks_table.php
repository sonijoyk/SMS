<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTermMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_term_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_terms_id')->comment('id from student_terms table');
            $table->foreign('student_terms_id')->references('id')->on('student_terms');
             $table->unsignedBigInteger('subject_id')->comment('id from subjects table');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('mark');
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
        Schema::dropIfExists('student_term_marks');
    }
}
