<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananPengasuhAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_pengasuh_anak', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("tahun");
            $table->integer("indoor");
            $table->integer("outdoor");
            $table->integer("online");
            $table->timestamps();
            $table->unique("tahun");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan_pengasuh_anak');
    }
}
