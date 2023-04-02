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
        Schema::create('afirmasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id');
            $table->foreignId('siswa_id');
            $table->string('kk');
            $table->string('skl');
            $table->string('kip')->nullable();
            $table->string('sktm')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('afirmasis');
    }
};
