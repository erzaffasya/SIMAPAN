<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKelurahanIdForumArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasColumn('forum_artikel', 'kelurahan_id')) {
            Schema::table('forum_artikel', function (Blueprint $table) {
                $table->unsignedBigInteger('kelurahan_id')->nullable();
                $table->foreign('kelurahan_id')->references('id')->on('kelurahan');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if (Schema::hasColumn('forum_artikel', 'kelurahan_id')) {
            Schema::table('forum_artikel', function (Blueprint $table) {
                $table->dropForeign(['kelurahan_id']);
                $table->dropColumn('kelurahan_id');
            });
        }
    }
}
