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
        Schema::table('prestasis', function (Blueprint $table) {
            $table->string('bukti_nilai_rapor')->after('jumlah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestasis', function (Blueprint $table) {
            $table->dropColumn('bukti_nilai_rapor');
        });
    }
};
