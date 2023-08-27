<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersentaseAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persentase_anak', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("tahun");
            $table->integer("akta_kelahiran");
            $table->integer("kartu_identitas");
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
        Schema::dropIfExists('persentase_anak');
    }
}
