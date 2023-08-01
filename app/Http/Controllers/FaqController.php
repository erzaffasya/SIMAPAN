<?php

namespace App\Http\Controllers;


use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::all();
        return view('admin.faq.index', compact('faq'));
    }

    public function create()
    {
        return view('admin.faq.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            "urut" => "required",
            "question" => "required",
            "answer_religius" => "required",
            "answer_psikolog" => "required",
        ]);

        Faq::create([
            'urut' => $request->urut,
            'question' => $request->question,
            'answer_religius' => $request->answer_religius,
            'answer_psikolog' => $request->answer_psikolog,
        ]);


        return redirect()->route('faq.index')
            ->with('success', 'Faq Berhasil Ditambahkan');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.ubah', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->urut = $request->urut;
        $faq->question = $request->question;
        $faq->answer_religius = $request->answer_religius;
        $faq->answer_psikolog = $request->answer_psikolog;
        $faq->save();

        return redirect()->route('faq.index')
            ->with('success', 'Faq Berhasil Diubah');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')
            ->with('success', 'Faq Berhasil Dihapus');
    }
}