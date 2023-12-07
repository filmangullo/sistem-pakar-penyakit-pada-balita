<?php

namespace App\Http\Controllers;

use App\Models\gejala;
use App\Http\Requests\StoregejalaRequest;
use App\Http\Requests\UpdategejalaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('pages.gejala.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.gejala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_gejala' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gejala = new Gejala();
        $gejala->nama_gejala = $request->nama_gejala;
        $gejala->save();

        return redirect('/gejala')->with('success', 'Berhasil menambahkan gejala');
    }

    /**
     * Display the specified resource.
     */
    public function show(gejala $gejala)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gejala = Gejala::find($id);

        return view('pages.gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_gejala' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gejala = Gejala::find($request->id);
        $gejala->nama_gejala = $request->nama_gejala;
        $gejala->save();

        return redirect('/gejala')->with('success', 'Berhasil mengubah gejala');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gejala::destroy($id);

        return redirect('/gejala')->with('success', 'Berhasil menghapus gejala');
    }
}
