<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\gejala;
use App\Models\penyakit;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $penyakit_count = penyakit::count();
        $gejala_count = gejala::count();
        $pengetahuan_count = gejala::count();
        $diagnosa_count = Diagnosa::count();

        $penyakits = penyakit::orderBy('created_at', 'desc')->get();

        return view('pages.index', compact('penyakit_count', 'gejala_count', 'pengetahuan_count', 'diagnosa_count', 'penyakits'));
    }

    function about()
    {
        return view('pages.about');
    }
}
