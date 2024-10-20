<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKantorColumnArtikelForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('forum_artikel', function (Blueprint $table) {
            $table->foreignId("kantor_id")->nullable()->constrained("kantor");
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
        Schema::table('forum_artikel', function (Blueprint $table) {
            $table->dropColumn("kantor_id");
        });
    }
}
