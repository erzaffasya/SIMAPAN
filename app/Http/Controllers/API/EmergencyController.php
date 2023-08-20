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
        // $request->validate([
        //     'judul' => 'required|string',
        //     'gmaps' => 'nullable|string',
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        // ]);
        // return $request->file('photo');
        $filePath = null;
        if ($request->file('photo') != null) {
            // dd('asdas');
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('emergency', $fileName, 'public'); // Save the file to the storage/public/uploads directory
        }


        $task = Emergency::create([
            'judul' => $request->input('judul'),
            'gmaps' => "https://www.google.com/maps?q=" . $request->input('latitude') . ',' . $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'catatan' => $request->input('catatan'),
            'users_id' => Auth::user()->id,
            'photo' => "storage/". $filePath,
        ]);

        return response()->json($task, 201);
    }

    public function getEmergency(Request $request)
    {
        $task = Emergency::orderBy('created_at', 'DESC')->where('users_id', Auth::user()->id)->get();
        $response = ["data" => $task];
        return response()->json($response, 201);
    }
}
