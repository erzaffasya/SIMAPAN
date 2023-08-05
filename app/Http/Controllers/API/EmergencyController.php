<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmergencyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'gmaps' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        $photoPath = $request->file('photo')->store('photo'); // Store the photo in the 'photos' directory

        $task = Emergency::create([
            'judul' => $request->input('judul'),
            'gmaps' => $request->input('gmaps'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'catatan' => $request->input('catatan'),
            'users_id' => Auth::user()->id,
            'photo' => $photoPath,
        ]);

        return response()->json($task, 201);
    }

    public function getEmergency(Request $request)
    {
        $task = Emergency::where('users_id',Auth::user()->id)->get();
        $response = [ "data" => $task ];
        return response()->json($response, 201);
    }

}