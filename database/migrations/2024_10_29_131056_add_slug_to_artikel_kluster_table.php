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

        DB::table('artikel_kluster')
            ->whereNull('slug') 
            ->orWhere('slug', '')
            ->get()
            ->each(function ($item) {
                $slug = Str::slug($item->title ?? 'artikel-' . $item->id);
                DB::table('artikel_kluster')->where('id', $item->id)->update(['slug' => $slug]);
            });

        Schema::table('artikel_kluster', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
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
