<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    public $timestamps = false;

    protected $table = "m_unitkerjas";

    protected $Primarykey = "id_unitkerja";

    protected $fillable = ['id_unitkerja', 'unit_kerja'];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
