<?php

namespace App\Models\Item;

use App\Models\Checkup\DetailPeriksa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];

    /**
     * Get all of the comments for the Obat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_periksa(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat', 'id');
    }
}
