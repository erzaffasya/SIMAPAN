<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToProfilKategoriGaleri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profil_kategori_galeri', function (Blueprint $table) {
            $table->string('slug')->after('judul');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profil_kategori_galeri', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}