<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToForumArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forum_artikel', function (Blueprint $table) {
            $table->string('slug')->after('judul');
            $table->string('isi')->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forum_artikel', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('isi');
        });
    }
}