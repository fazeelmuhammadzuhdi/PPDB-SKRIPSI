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
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->integer('sekolah_id')->nullable()->index();
            $table->string('npsn', 15)->unique();
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('akreditasi', 4);
            $table->string('kecamatan', 100)->nullable();
            $table->string('notelp', 15)->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('sekolahs');
    }
};
