<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergency = Emergency::all();
        return view('admin.emergency.index', compact('emergency'));
    }
}
