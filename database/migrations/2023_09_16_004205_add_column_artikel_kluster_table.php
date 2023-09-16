<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnArtikelKlusterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artikel_kluster', function (Blueprint $table) {
            $table->text('description')->change();
            $table->text('subtitle')->change();
        });
        Schema::table('artikel_kluster_detail', function (Blueprint $table) {
            $table->text('subtitle')->change();
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