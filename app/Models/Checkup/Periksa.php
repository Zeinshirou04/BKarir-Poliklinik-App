<?php

namespace App\Models\Checkup;

use App\Models\Item\Obat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Periksa extends Model
{
    protected $fillable = [
        'id_janji_periksa',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    /**
     * Get the user that owns the Periksa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            JanjiPeriksa::class,
            'id',
            'id',
            'id_janji_periksa',
            'id_pasien'
        );
    }
    
    /**
     * Get the user that owns the Periksa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_dokter', 'id');
    }

    /**
     * Get all of the detail for the Periksa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPeriksa(): HasOne
    {
        return $this->hasOne(DetailPeriksa::class, 'id_periksa', 'id');
    }

    public function obat(): HasManyThrough
    {
        return $this->hasManyThrough(
            Obat::class,
            DetailPeriksa::class,
            'id_periksa',
            'id',
            'id',
            'id_obat'
        );
    }
}
