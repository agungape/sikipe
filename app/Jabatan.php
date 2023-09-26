<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public $timestamps = false;

    protected $table = "m_jabatans";

    protected $primaryKey = "id_jabatan";

    protected $fillable = ['id_jabatan', 'nama_jabatan'];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
