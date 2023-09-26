<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use Yajra\Datatables\Datatables;

class JabatanController extends Controller
{
    public function json()
    {
        return Datatables::of(Jabatan::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/jabatan/' . $row->id_jabatan . '/edit" class="btn btn-warning btn-sm" hidden><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'jabatan/' . $row->id_jabatan, 'method' => 'delete']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }

    public function index()
    {
        return view('jabatan.index');
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required',
        ]);

        $unitkerja = new Jabatan();
        $unitkerja->create($request->all());

        return redirect()->route('jabatan.index')->with('pesan', "Penambahan Data Jabatan {$request['unit_kerja']} Berhasil");
    }
}
