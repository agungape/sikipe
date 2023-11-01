<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skp extends Model
{
    protected $table = "m_skps";

    protected $fillable = ['id_skp', 'skp'];

    public function rincians()
    {
        return $this->hasMany(Rincian::class);
    }
}
