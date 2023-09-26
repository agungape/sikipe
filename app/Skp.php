<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skp extends Model
{
    protected $table = "m_skps";

    protected $fillable = ['id', 'skp'];

    public function rincians()
    {
        return $this->hasMany(Rincian::class);
    }
}
