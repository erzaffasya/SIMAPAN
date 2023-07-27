<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_galeri', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_kategori_galeri")->constrained("profil_kategori_galeri");
            $table->string("judul");
            $table->string("foto");
            $table->string("thumbnail");
            $table->text("deskripsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_galeri');
    }
}