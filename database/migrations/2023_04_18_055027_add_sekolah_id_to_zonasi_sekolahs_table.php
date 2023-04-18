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
        Schema::table('zonasi_sekolahs', function (Blueprint $table) {
            $table->foreignId('sekolah_id')->nullable()->after('kecamatan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zonasi_sekolahs', function (Blueprint $table) {
            $table->dropColumn('sekolah_id');
        });
    }
};
