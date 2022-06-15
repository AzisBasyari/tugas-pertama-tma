<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'password'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'id_provinsi');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'id_kota');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'id_kecamatan');
    }
}
