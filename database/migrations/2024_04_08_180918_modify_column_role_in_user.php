<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE {$table->getTable()} MODIFY `role` ENUM('admin', 'admin seminar', 'commite', 'judge', 'participant')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            DB::statement("ALTER TABLE {$table->getTable()} MODIFY `role` ENUM('admin', 'commite', 'judge', 'participant')");
        });
    }
};
