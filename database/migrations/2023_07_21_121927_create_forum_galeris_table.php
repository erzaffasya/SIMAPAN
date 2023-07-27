<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_galeri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori_galeri')->constrained('forum_kategori_galeri');
            $table->string("thumbnail");
            $table->string("foto");
            $table->string("judul");
            $table->text("isi");
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
        Schema::dropIfExists('forum_galeri');
    }
}
