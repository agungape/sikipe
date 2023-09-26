<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitkerja;
use Yajra\Datatables\Datatables;

class UnitkerjaController extends Controller
{
    public function json()
    {
        return Datatables::of(Unitkerja::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/unitkerja/' . $row->id_unitkerja . '/edit" class="btn btn-warning btn-sm" hidden><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'unitkerja/' . $row->id_unitkerja, 'method' => 'delete']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }

    public function index()
    {
        return view('unitkerja.index');
    }

    public function create()
    {
        return view('unitkerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_kerja' => 'required',
        ]);

        $unitkerja = new Unitkerja();
        $unitkerja->create($request->all());

        return redirect()->route('unitkerja.index')->with('pesan', "Penambahan Data Unit Kerja {$request['unit_kerja']} berhasil");
    }
}
