<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = "m_diagnosas";

    protected $fillable = ['code', 'name_en', 'name_id'];

    public function rincians()
    {
        return $this->hasMany(Rincian::class);
    }
}
