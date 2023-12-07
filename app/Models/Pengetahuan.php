<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengetahuan extends Model
{
    use HasFactory, SoftDeletes;


    function penyakit()
    {
        return $this->belongsTo(penyakit::class, 'penyakit_id', 'id');
    }

    function gejala()
    {
        return $this->belongsTo(gejala::class, 'gejala_id', 'id');
    }
}
