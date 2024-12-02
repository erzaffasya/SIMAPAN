<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddSlugToArtikelKlusterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artikel_kluster', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable();
        });

        // Fill the slug column with the slug of the title column
        DB::table('artikel_kluster')->get()->each(function ($item) {
            $slug = Str::slug($item->title ?? 'artikel-' . $item->id);  
            DB::table('artikel_kluster')->where('id', $item->id)->update(['slug' => $slug]);
        });

        Schema::table('artikel_kluster', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artikel_kluster', function (Blueprint $table) {
            $table->dropColumn('slug');  // Menghapus kolom slug
        });
    }
}
