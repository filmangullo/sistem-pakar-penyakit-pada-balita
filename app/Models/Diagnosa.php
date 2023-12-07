<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosa extends Model
{
    use HasFactory, SoftDeletes;

    public function penyakit()
    {
        return $this->belongsTo(penyakit::class, 'penyakit_id', 'id');
    }
}
