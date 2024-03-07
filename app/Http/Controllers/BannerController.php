<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
/**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.banner.tambah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'required|mimes:jpeg,png,jpg,gif',
        ]);


        if ($request->banner) {
            $path = storage_path("app/public/img/banner");
            $extention = $request->banner->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('banner');
            $image = Image::make($request->file('banner'));
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");
            
        } else {
            $file_name = null;
        }

        if ($request->gambar) {
            $path = storage_path("app/public/img/banner");
            $extention = $request->banner->extension();
            $file_name1 = time() . '1.' . $extention;
            $image = $request->file('banner');
            $image = Image::make($request->file('banner'));
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name1");
            
        } else {
            $file_name1 = null;
        }

        

        Banner::create([
            "banner" => $file_name,
            "gambar" => $file_name1,
            "judul" => $request->judul,
            "deskripsi" => $request->deskripsi,
        ]);


        return redirect()->route('banner.index')
            ->with('success', 'Banner Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        return view('landingpage.banner-detail', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.ubah', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'banner' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);


        if ($request->banner) {
            $path = storage_path("app/public/img/banner");

            if (File::exists("$path/$banner->banner")) {
                File::delete("$path/$banner->banner");
            }

            $extention = $request->banner->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('banner');
            $image = Image::make($request->file('banner'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");

        } else {
            $file_name = $banner->banner;
        }


        if ($request->gambar) {
            $path = storage_path("app/public/img/banner");

            if (File::exists("$path/$banner->banner")) {
                File::delete("$path/$banner->banner");
            }

            $extention = $request->gambar->extension();
            $file_name1 = time() . '1.' . $extention;
            $image = $request->file('gambar');
            $image = Image::make($request->file('gambar'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name1");

        } else {
            $file_name1 = $banner->gambar;
        }
        
        $banner->gambar = $file_name1;
        $banner->banner = $file_name;
        $banner->judul = $request->judul;
        $banner->deskripsi = $request->deskripsi;
        $banner->save();

        return redirect()->route('banner.index')
            ->with('success', 'Banner Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banner.index')
            ->with('success', 'Banner Berhasil Dihapus');
    }
}
