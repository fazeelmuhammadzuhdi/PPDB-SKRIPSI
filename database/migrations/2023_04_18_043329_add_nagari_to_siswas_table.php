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
        Schema::table('siswas', function (Blueprint $table) {
            $table->integer('kecamatan_id')->nullable()->after('user_id');
            $table->integer('nagari_id')->nullable()->after('kecamatan_id');
            $table->integer('kampung_id')->nullable()->after('nagari_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn('kecamatan_id');
            $table->dropColumn('nagari_id');
            $table->dropColumn('kampung_id');
        });
    }
};
