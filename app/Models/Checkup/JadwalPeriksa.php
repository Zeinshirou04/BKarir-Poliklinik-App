<?php

namespace App\Models\Checkup;

use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];
}
