<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LandingpageController extends Controller
{
    public function index()
    {
        $Kantor = Kantor::all();
        foreach($Kantor as $item){
            $location[] = [
                "kantor" => $item->kantor,
                "deskripsi_map" => $item->deskripsi_map,
                "latitude" => $item->latitude,
                "longitude" => $item->longitude
            ];
        }
        // dd($location->count());
        return view('welcome', compact('location'));
    }
}
