<?php

namespace App\Models\Checkup;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class JanjiPeriksa extends Model
{
    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'keluhan',
        'no_antrian'
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function jadwalPeriksa(): BelongsTo
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    public function periksa(): HasOne
    {
        return $this->hasOne(Periksa::class, 'id_janji_periksa');
    }

    public function dokter(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            JadwalPeriksa::class,
            'id',
            'id',
            'id_jadwal',
            'id_dokter'
        );
    }
}
