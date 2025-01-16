<?php

namespace App\Http\Controllers;

use App\Models\Kebijakan;
use App\Models\KebijakanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class KebijakanController extends Controller
{
    public function index()
    {
        $kebijakan = Kebijakan::all();
        return view("admin.kebijakan.index", compact("kebijakan"));
    }

    public function create()
    {
        return view("admin.kebijakan.tambah");
    }

    public function store(Request $request)
    {
        $request->validate([
            "judul" => "required",
            "deskripsi" => "required",
            "file_detail" => "required|mimes:pdf",
            "judul_detail" => "required",
        ]);

        DB::transaction(function () use ($request) {

            $kebijakan = Kebijakan::create([
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
            ]);

            foreach ($request->file_detail as $key => $pdfFile) {
                if ($request->hasFile("file_detail")) {
                    $customName = 'kebijakan_' . time(); // Custom name with timestamp
                    $pdfExtension = $pdfFile->getClientOriginalExtension();
                    $pdfFileName = $customName . '.' . $pdfExtension;
                    $pdfPath = $pdfFile->storeAs('files/pdf/kebijakan', $pdfFileName, 'public'); // Store with custom name

                    KebijakanDetail::create([
                        "kebijakan_id" => $kebijakan->id,
                        "judul" => $request->judul_detail[$key],
                        "file" => $pdfFileName,
                    ]);
                }
            }
        });

        return redirect()->back()->with("success", 'Kebijakan Berhasil Ditambahkan');
    }

    public function show(Kebijakan $kebijakan)
    {
        abort(404);
    }

    public function edit(Kebijakan $kebijakan)
    {
        return view("admin.kebijakan.ubah", compact("kebijakan"));
    }

    public function update(Request $request, Kebijakan $kebijakan)
    {
        $request->validate([
            "judul" => "required",
            "deskripsi" => "required",
            "file_detail" => "nullable|mimes:pdf",
            "judul_detail" => "required",
        ]);

        DB::transaction(function () use ($request, $kebijakan) {
            $kebijakan->judul = $request->judul;
            $kebijakan->deskripsi = $request->deskripsi;
            $kebijakan->save();

            foreach ($request->judul_detail as $key => $judul_detal) {
                if ($request->hasFile("file_detail")) {
                    $customName = 'kebijakan_' . time(); // Custom name with timestamp
                    $pdfFile = $request->file_detail[$key];
                    $pdfExtension = $pdfFile->getClientOriginalExtension();
                    $pdfFileName = $customName . '.' . $pdfExtension;
                    $pdfPath = $pdfFile->storeAs('files/pdf/kebijakan', $pdfFileName, 'public'); // Store with custom name
                }
                $kebijakandetail = KebijakanDetail::firstOrCreate(
                    [
                        "id" => $request->id[$key] ?? null,
                        "kebijakan_id" => $kebijakan->id,
                    ],
                    [
                        "judul" => $request->judul_detail[$key],
                        "file" => $pdfFileName,
                    ]
                );
                $pdfFileName = $request->hasFile("file_detail") ? $pdfFileName : $kebijakandetail->file;
                $kebijakandetail->judul = $kebijakan->judul;
                $kebijakandetail->file = $pdfFileName;
                $kebijakandetail->save();
            }
        });

        return redirect()->route('kebijakan.index')
            ->with('success', 'Kebijakan Berhasil Diubah');
    }

    public function destroy(Kebijakan $kebijakan)
    {
        foreach ($kebijakan->detail as $key => $value) {
            if (Storage::disk('public')->exists("storage/files/pdf/kebijakan/$value->file")) {
                Storage::disk('public')->delete("storage/files/pdf/kebijakan/$value->file");
            }
        }
        $kebijakan->detail()->delete();
        $kebijakan->delete();

        return redirect()->route('kebijakan.index')
            ->with('success', 'Kebjakan Berhasil Dihapus');
    }
}
