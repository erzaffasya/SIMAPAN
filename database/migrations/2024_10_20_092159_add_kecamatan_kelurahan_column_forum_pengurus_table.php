<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKecamatanKelurahanColumnForumPengurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forum_pengurus', function (Blueprint $table) {
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forum_pengurus', function (Blueprint $table) {
            $table->dropColumn('kecamatan');
            $table->dropColumn('kelurahan');
        });
    }
}
