<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_gradings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained('submissions');
            $table->foreignId('grading_criteria_id')->constrained('grading_criterias');
            $table->foreignId('judge_id')->constrained('users');
            $table->integer('score');
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
        Schema::dropIfExists('submission_gradings');
    }
};
