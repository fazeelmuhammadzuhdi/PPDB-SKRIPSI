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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->index();
            $table->foreignId('siswa_id')->index();
            $table->integer('k6sm1');
            $table->integer('k6sm2');
            $table->integer('k5sm1');
            $table->integer('k5sm2');
            $table->integer('k4sm2');
            $table->integer('jumlah')->nullable();
            $table->integer('status')->nullable();
            // $table->enum('status', [0, 1, 2])->default(0);
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
        Schema::dropIfExists('prestasis');
    }
};
