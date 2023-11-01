<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Jabatan;
use App\Unitkerja;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    function json()
    {
        $kegiatan = DB::table('tb_kegiatans')
            ->join('m_unitkerjas', 'tb_kegiatans.m_unitkerja_id', '=', 'm_unitkerjas.id_unitkerja')
            ->join('m_jabatans', 'tb_kegiatans.m_jabatan_id', '=', 'm_jabatans.id_jabatan')
            ->get();

        // fungsi untuk mengubah format tanggal
        foreach ($kegiatan as $tanggal) {
            $tanggal->tanggal_ubah = Carbon::parse($tanggal->tanggal)->format('d-m-Y');
        }

        return Datatables::of($kegiatan)
            ->addColumn('status', function ($status) {
                return $status->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function ($row) {
                $action  = '<a href="/kegiatan_rincian/' . $row->id_kegiatan . ' " class="btn btn-primary btn-sm" style="margin-right: 14px"><i class="fas fa-eye"></i></a>';
                $action  = $action .  '<a href="/kegiatan/' . $row->id_kegiatan . '/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'kegiatan/' . $row->id_kegiatan, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }

    public function index()
    {
        return view('kegiatan.index');
    }

    public function create()
    {
        $unit = Unitkerja::pluck('unit_kerja', 'id_unitkerja');
        $jabatan = Jabatan::pluck('nama_jabatan', 'id_jabatan');

        return view('kegiatan.create', ['unit' => $unit, 'jabatan' => $jabatan]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'pk_bk' => 'required',
            'tanggal' => 'required',
            'm_jabatan_id' => '',
            'm_unitkerja_id' => '',
        ]);

        $user_id = Auth::id();

        Kegiatan::create([
            'user_id' => $user_id,
            'pk_bk' => $request->pk_bk,
            'tanggal' => $request->tanggal,
            'm_jabatan_id' => $request->m_jabatan_id,
            'm_unitkerja_id' => $request->m_unitkerja_id
        ]);
        return redirect()->route('kegiatan.index')->with('pesan', "Penambahan Data Kegiatan {$request['tanggal']} berhasil");
    }

    public function edit($id)
    {
        $unit = Unitkerja::pluck('unit_kerja', 'id_unitkerja');
        $jabatan = Jabatan::pluck('nama_jabatan', 'id_jabatan');
        $kegiatan = Kegiatan::where('id_kegiatan', $id)->first();
        return view('kegiatan.edit', ['kegiatan' => $kegiatan, 'unit' => $unit, 'jabatan' => $jabatan]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'pk_bk' => 'required',
            'tanggal' => '',
            'm_unitkerja_id' => 'required',
            'm_jabatan_id' => 'required',
        ]);

        Kegiatan::where('id', $id)->update($validate);
        return redirect()->route('kegiatan.index')->with(
            'pesan',
            "Update Data Kegiatan {$validate['tanggal']} berhasil"
        );
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::where('id_kegiatan', $id);
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('pesan', "Hapus data berhasil");
    }
}
