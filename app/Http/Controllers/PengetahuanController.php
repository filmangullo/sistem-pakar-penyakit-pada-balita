<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use App\Http\Requests\StorePengetahuanRequest;
use App\Http\Requests\UpdatePengetahuanRequest;
use App\Models\gejala;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengetahuan = Pengetahuan::orderBy('created_at', 'desc')->get();
        return view('pages.pengetahuan.index', compact('pengetahuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penyakit = penyakit::all();
        $gejala = gejala::all();

        return view('pages.pengetahuan.create', compact('penyakit', 'gejala'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
            // 'md' => 'required',
            // 'mb' => 'required',
            'cf' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penyakit = new Pengetahuan();
        $penyakit->penyakit_id = $request->penyakit_id;
        $penyakit->gejala_id = $request->gejala_id;
        $penyakit->md = 0.0;
        $penyakit->mb = 0.0;
        $penyakit->cf = $request->cf;
        $penyakit->save();

        return redirect('/pengetahuan')->with('success', 'Berhasil menambahkan pengetahuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengetahuan $pengetahuan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penyakit = penyakit::all();
        $gejala = gejala::all();
        $pengetahuan = Pengetahuan::find($id);

        return view('pages.pengetahuan.edit', compact('penyakit', 'gejala', 'pengetahuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
            // 'md' => 'required',
            // 'mb' => 'required',
            'cf' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penyakit = Pengetahuan::find($request->id);
        $penyakit->penyakit_id = $request->penyakit_id;
        $penyakit->gejala_id = $request->gejala_id;
        // $penyakit->md = $request->md;
        // $penyakit->mb = $request->mb;
        $penyakit->cf = $request->cf;
        $penyakit->save();

        return redirect('/pengetahuan')->with('success', 'Berhasil mengubah pengetahuan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pengetahuan::destroy($id);

        return redirect('/pengetahuan')->with('success', 'Berhasil menghapus pengetahuan');
    }
}
