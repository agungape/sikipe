<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    public $timestamps = false;

    protected $table = "tb_kegiatan_rincian";

    protected $fillable = ['id', 'user_id', 'tb_kegiatan_id', 'm_skp_id', 'm_diagnosa_id', 'nama', 'tindakan', 'waktu_mulai', 'waktu_selesai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skp()
    {
        return $this->belongsTo(Skp::class);
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
