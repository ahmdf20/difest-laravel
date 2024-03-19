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
        Schema::create('grading_criterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comp_id')->constrained('competitions');
            $table->string('label');
            $table->enum('criteria_type', ['Penilaian Karya', 'Penilaian Presentasi']);
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
        Schema::dropIfExists('grading_criterias');
    }
};
