<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesScoreExcelFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_score_excel_files', function (Blueprint $table) {
            $table->id('id');
            $table->string('name','255')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('course_id');
            // đây là đoạn thêm khóa ngoại
            $table->foreign('course_id')->references('id')->on('courses');
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_score_excel_files');
    }
}