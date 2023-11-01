<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    public $timestamps = false;

    protected $table = "tb_kegiatans";

    protected $primaryKey = "id_kegiatan";

    protected $fillable = ['id_kegiatan', 'pk_bk', 'm_jabatan_id', 'user_id', 'm_unitkerja_id', 'tanggal', 'jumlah_kegiatan', 'jam_efektif', 'status'];

    public function rincians()
    {
        return $this->hasMany(Rincian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unitkerja()
    {
        return $this->belongsTo(Unitkerja::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
