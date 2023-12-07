<?php

namespace App\Http\Controllers;

use App\Models\penyakit;
use App\Http\Requests\StorepenyakitRequest;
use App\Http\Requests\UpdatepenyakitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('pages.penyakit.index', compact('penyakits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.penyakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penyakit' => 'required|string',
            'det_penyakit' => 'required|string',
            'srn_penyakit' => 'required|string',
            // 'min_cf' => 'required',
            // 'max_cf' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penyakit = new Penyakit();
        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->det_penyakit = $request->det_penyakit;
        $penyakit->srn_penyakit = $request->srn_penyakit;
        $penyakit->min_cf = 0.0;
        $penyakit->max_cf = 0.0;
        $penyakit->save();

        return redirect('/penyakit')->with('success', 'Berhasil menambahkan penyakit');
    }

    /**
     * Display the specified resource.
     */
    public function show(penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penyakit = Penyakit::find($id);

        return view('pages.penyakit.edit', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_penyakit' => 'required|string',
            'det_penyakit' => 'required|string',
            'srn_penyakit' => 'required|string',
            // 'min_cf' => 'required',
            // 'max_cf' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penyakit = Penyakit::find($request->id);
        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->det_penyakit = $request->det_penyakit;
        $penyakit->srn_penyakit = $request->srn_penyakit;
        // $penyakit->min_cf = $request->min_cf;
        // $penyakit->max_cf = $request->max_cf;
        $penyakit->save();

        return redirect('/penyakit')->with('success', 'Berhasil mengubah penyakit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Penyakit::destroy($id);

        return redirect('/penyakit')->with('success', 'Berhasil menghapus penyakit');
    }
}
