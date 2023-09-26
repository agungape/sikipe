<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = "m_diagnosas";

    protected $fillable = ['code', 'nama'];

    public function rincians()
    {
        return $this->hasMany(Rincian::class);
    }
}
