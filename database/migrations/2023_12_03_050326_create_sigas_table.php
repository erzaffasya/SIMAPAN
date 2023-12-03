<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siga', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->string("deskripsi")->nullable();
            $table->string("file");
            $table->foreignId("siga_jenis_id")->constrained("siga_jenis");
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
        Schema::dropIfExists('siga');
    }
}
