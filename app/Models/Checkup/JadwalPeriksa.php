<?php

namespace App\Models\Checkup;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class JadwalPeriksa extends Model
{
    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];

    public function periksa(): HasManyThrough
    {
        return $this->hasManyThrough(
            Periksa::class,
            JanjiPeriksa::class,
            'id_jadwal',
            'id_periksa',
            'id',
            'id'
        );
    }

    public function pasien(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            JanjiPeriksa::class,
            'id_jadwal',
            'id',
            'id',
            'id_pasien'
        );
    }

    public function janjiPeriksa(): HasMany
    {
        return $this->hasMany(
            JanjiPeriksa::class,
            'id_jadwal',
        );
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_dokter'
        );
    }
}
