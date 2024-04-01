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
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('instance')->nullable();
            $table->text('address')->nullable();
            $table->enum('payment_method', ['0', '1']); // [Cash, Transfer]
            $table->string('payment_photo')->nullable();
            $table->enum('status', ['0', '1']); // [Mahasiswa/Pelajar, Umum]
            $table->enum('is_offline', ['0', '1']); // [Yes, No]
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
        Schema::dropIfExists('seminars');
    }
};
