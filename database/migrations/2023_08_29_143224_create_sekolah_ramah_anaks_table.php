<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahRamahAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah_ramah_anak', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("tahun");
            $table->integer("paud");
            $table->integer("sd");
            $table->integer("smp");
            $table->integer("slta");
            $table->integer("slb");
            $table->boolean("isaktif")->default(false);
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
        Schema::dropIfExists('sekolah_ramah_anak');
    }
}