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
            $table->string('no_urut')->nullable()->after('sekolah_id');
            $table->string('nilai')->nullable()->after('no_urut');
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
            //
        });
    }
};
