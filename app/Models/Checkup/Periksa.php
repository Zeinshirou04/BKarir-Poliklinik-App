<?php

namespace App\Models\Checkup;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Periksa extends Model
{
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    /**
     * Get the user that owns the Periksa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pasien', 'id');
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
}
