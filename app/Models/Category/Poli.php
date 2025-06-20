<?php

namespace App\Models\Category;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poli extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id_poli')->where('role', 'dokter');
    }

    public function dokter() {
        return $this->user()->where('role', 'dokter');
    }
}
