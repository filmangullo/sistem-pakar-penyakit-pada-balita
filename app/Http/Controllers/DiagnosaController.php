<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use App\Models\gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use afrizalmy\CertaintyFactor\Cf\CertaintyFactor;
use App\Models\Pengetahuan;
use App\Models\penyakit;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosas = Diagnosa::all();
        return view('pages.diagnosa.index', compact('diagnosas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gejala = gejala::all();
        return view('pages.diagnosa.create', compact('gejala'));
    }

    function calculateCFcombine($cf1, $cf2)
    {
        return $cf1 + $cf2 * (1 - $cf1);
    }

    function getHighestResult($dataArray)
    {
        $highestResult = null;
        $highestValue = -INF;

        foreach ($dataArray as $data) {
            if ($data['hasil'] > $highestValue) {
                $highestValue = $data['hasil'];
                $highestResult = $data;
            }
        }

        return $highestResult;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pasien' => 'required',
            'usia_pasien' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/diagnosa')->withErrors($validator)->withInput();
        }
        //        dd($request->result);

        $isValidation = false;
        foreach ($request->result as $resultEl) {
            if (floatval($resultEl) > 0) {
                $isValidation = true;
            }
        }

        if (!$isValidation) {
            return redirect('/diagnosa')->with("warning", "Anda sedang sehat");
        }

        $pengetahuans = Pengetahuan::all();
        $dataCF = [];
        foreach ($pengetahuans as $key => $pengetahuan) {
            $dataCF[$key]['kode_case'] = $pengetahuan->penyakit->id;
            $dataCF[$key]['nama_case'] = $pengetahuan->penyakit->nama_penyakit;
            $dataCF[$key]['kode_rule'] = $pengetahuan->gejala->id;
            $dataCF[$key]['nama_rule'] = $pengetahuan->gejala->nama_gejala;
            $dataCF[$key]['cf'] = $pengetahuan->cf;
        }
        $data_input = [];
        $j = 0;
        for ($i = 0; $i < count($request->gejala_ids); $i++) {
            if ($request->result[$i] != 0) {
                $data_input[$j]['kode_rule'] =  $request->gejala_ids[$i];
                $data_input[$j]['persentase_user'] =  floatval($request->result[$i]);
                $j++;
            }
        }

        $calculate = [];
        for ($t = 0; $t < count($dataCF); $t++) {
            for ($g = 0; $g < count($data_input); $g++) {
                if ($dataCF[$t]['kode_rule'] == $data_input[$g]['kode_rule']) {
                    $tmp = $dataCF[$t]['cf'] * $data_input[$g]['persentase_user'];
                    $calculate[$dataCF[$t]['kode_case']][] = $tmp;
                };
            }
        }
        $combileA = [];
        foreach ($calculate as $key => $value) {
            $combileA[] = [
                'kode_case' => $key,
                'cf_count' => $value,
            ];
        }

        foreach ($combileA as $key => $value) {
            $cfCombine = $value['cf_count'][0];
            for ($a = 1; $a < count($value['cf_count']); $a++) {
                $cfCombine = $this->calculateCFcombine($cfCombine, $value['cf_count'][$a]);
            }
            $hasilPresentase = $cfCombine * 100;
            $combileA[$key]['hasil'] = $hasilPresentase;
        }

        $highestResult = $this->getHighestResult($combileA);

        $diagnosa = new Diagnosa();
        $diagnosa->nama_pasien = $request->nama_pasien;
        $diagnosa->usia_pasien = $request->usia_pasien;
        $diagnosa->kelas_pasien = '1';

        $diagnosa->data_input = json_encode($data_input);
        $diagnosa->list_penyakit = json_encode($combileA);
        $diagnosa->penyakit_id = $highestResult['kode_case'];
        $diagnosa->hasil_cf = $highestResult['hasil'];
        $diagnosa->save();

        return redirect("/diagnosa/$diagnosa->id");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $diagnosa = Diagnosa::find($id);
        $penyakit = penyakit::all();
        $gejalas = gejala::all();
        $data_input = json_decode($diagnosa->data_input);
        $list_penyakit = json_decode($diagnosa->list_penyakit);


        foreach ($gejalas as $gejala) {
            foreach ($data_input as $key => $row) {
                if ($gejala->id == $row->kode_rule) {
                    $data_input[$key]->nama_gejala = $gejala->nama_gejala;
                }
            }
        }

        foreach ($penyakit as $p) {
            foreach ($list_penyakit as $key => $row) {
                if ($p->id == $row->kode_case) {
                    $list_penyakit[$key]->id_penyakit = $p->id;
                    $list_penyakit[$key]->nama_penyakit = $p->nama_penyakit;
                    $list_penyakit[$key]->det_penyakit = $p->det_penyakit;
                    $list_penyakit[$key]->srn_penyakit = $p->srn_penyakit;
                }
            }
        }

        $diagnosaSame = [];
        foreach ($list_penyakit as  $penyakit) {
            if ($penyakit->id_penyakit == $diagnosa->penyakit_id) {
                $diagnosaSame[] = [
                    "name" =>  $penyakit->nama_penyakit,
                    "hasil" => $penyakit->hasil,
                    "det" => $penyakit->det_penyakit,
                    "srn" => $penyakit->srn_penyakit,
                ];
            } else if ($penyakit->hasil == $diagnosa->hasil_cf) {
                $diagnosaSame[] = [
                    "name" =>  $penyakit->nama_penyakit,
                    "hasil" => $penyakit->hasil,
                    "det" => $penyakit->det_penyakit,
                    "srn" => $penyakit->srn_penyakit,
                ];
            }
        }


        return view('pages.diagnosa.show', compact('diagnosa', 'data_input', 'list_penyakit', 'diagnosaSame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiagnosaRequest $request, Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnosa $diagnosa)
    {
        //
    }
}
