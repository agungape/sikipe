<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kegiatan;
use App\Rincian;
use App\Diagnosa;
use App\Skp;
use DB;
use Yajra\Datatables\Datatables;

class RincianController extends Controller
{
    public function json($id)
    {   // Cari post berdasarkan ID
        $rincian = Rincian::where('tb_kegiatan_id', $id)->get();
        return Datatables::of($rincian)
            ->addColumn('action', function ($row) {
                $action  = '<a href="/rincian/' . $row->id . ' " class="btn btn-primary btn-sm" style="margin-right: 14px"><i class="fas fa-eye"></i></a>';
                $action  = $action .  '<a href="/kegiatan_rincian/' . $row->id . '/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'kegiatan_rincian/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }

    public function diagnosa_json()
    {
        return Datatables::of(Diagnosa::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/rincian/' . $row->code . ' " class="btn btn-primary btn-sm" style="margin-right: 14px"><i class="fas fa-eye"></i></a>';
                return $action;
            })->make(true);
    }

    public function index($id)
    {

        $kegiatan = Kegiatan::findOrFail($id);
        return view('rincian.index', ['kegiatans' => $kegiatan]);
    }

    public function rincian_create($id)
    {
        $skp = Skp::pluck('skp', 'id_skp');
        $kegiatan = Kegiatan::findOrFail($id);
        return view('rincian.create', ['skps' => $skp, 'kegiatan' => $kegiatan]);
    }

    public function rincian_store(Kegiatan $kegiatan, Request $request)
    {

        $request->validate([

            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'm_skp_id' => 'required',
            'nama' => 'required',
            'm_diagnosa_id' => 'required',
            'tindakan' => 'required',
        ]);

        $tb_kegiatan_id = $kegiatan->id_kegiatan;

        Rincian::create([
            'tb_kegiatan_id' => $tb_kegiatan_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'm_skp_id' => $request->m_skp_id,
            'nama' => $request->nama,
            'm_diagnosa_id' => $request->m_diagnosa_id,
            'tindakan' => $request->tindakan
        ]);


        $jumlahKegiatan = Rincian::where('tb_kegiatan_id', $kegiatan->id_kegiatan)->count(); // Menghitung jumlah kegiatan
        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)->update(['jumlah_kegiatan' => $jumlahKegiatan]);  // mengupdate data jumlah kegitaan dalam tabel tb_kegiatan

        return redirect()->route('kegiatan.rincian', $kegiatan->id_kegiatan)->with('pesan', "Penambahan Data Pasien {$request['nama']} berhasil");
    }

    public function rincian_edit($id)
    {
        $skp = Skp::pluck('skp', 'id_skp');
        $rincian = Rincian::where('id', $id)->first();

        return view('rincian.edit', ['rincian' => $rincian, 'skps' => $skp]);
    }

    public function rincian_update(Request $request, $id)
    {
        $validate = $request->validate([
            'tb_kegiatan_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'm_skp_id' => 'required',
            'nama' => 'required',
            'm_diagnosa_id' => 'required',
            'tindakan' => 'required',
        ]);

        Rincian::where('id', $id)->update($validate);
        return redirect()->route('kegiatan.rincian', $request->tb_kegiatan_id)->with(
            'pesan',
            "Update Data Rincian Kegiatan Berhasil"
        );
    }

    public function rincian_destroy($id)
    {
        $rincian = Rincian::where('id', $id);
        $rincian->delete();
        return redirect()->back()->with('pesan', "Hapus data berhasil");
    }
}
