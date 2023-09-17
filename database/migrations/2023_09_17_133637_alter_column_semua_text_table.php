<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnSemuaTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forum_struktur', function (Blueprint $table) {
            $table->text('deskripsi')->change();
        });
        Schema::table('forum_artikel', function (Blueprint $table) {
            $table->text('isi')->change();
        });
        Schema::table('kantor', function (Blueprint $table) {
            $table->text('deskripsi_map')->change();
        });
        Schema::table('faq', function (Blueprint $table) {
            $table->text('answer_religius')->change();
            $table->text('answer_psikolog')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}