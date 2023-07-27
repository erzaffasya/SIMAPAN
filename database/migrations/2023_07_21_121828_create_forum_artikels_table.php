<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori_artikel')->constrained('forum_kategori_artikel');
            $table->string("thumbnail");
            $table->string("foto");
            $table->string("judul");
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
        Schema::dropIfExists('forum_artikel');
    }

}
