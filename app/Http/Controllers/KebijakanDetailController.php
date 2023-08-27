<?php

namespace App\Http\Controllers;

use App\Models\KebijakanDetail;
use Illuminate\Http\Request;
use Storage;

class KebijakanDetailController extends Controller
{
    public function destroy(KebijakanDetail $kebijakan_detail)
    {
        $id = $kebijakan_detail->kebijakan->id;

        if (Storage::disk('public')->exists("storage/files/pdf/kebijakan/$kebijakan_detail->file")) {
            Storage::disk('public')->delete("storage/files/pdf/kebijakan/$kebijakan_detail->file");
        }
        $kebijakan_detail->delete();

        return redirect()->route('kebijakan.edit', $id)
            ->with('success', 'Deleted Kebijakan Detail');
    }
}