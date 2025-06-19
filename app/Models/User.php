<?php

namespace App\Models;

use App\Models\Checkup\JadwalPeriksa;
use App\Models\Checkup\JanjiPeriksa;
use App\Models\Checkup\Periksa;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
        'poli',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function jadwalPeriksa(): HasMany
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }

    public function janjiPeriksa(): HasMany
    {
        return $this->hasMany(JanjiPeriksa::class, 'id_pasien');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periksa(): HasManyThrough
    {
        return $this->hasManyThrough(
            Periksa::class,
            JanjiPeriksa::class,
            'id_pasien',
            'id_janji_periksa',
            'id',
            'id'
        );
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dokter_periksa(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_dokter', 'id');
    }
}
