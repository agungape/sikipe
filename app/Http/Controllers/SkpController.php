<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skp;

class SkpController extends Controller
{
    public function index()
    {
        return view('skp.index');
    }

    public function destroy($id)
    {
        $skp = Skp::where('id_skp', $id);
        $skp->delete();
        return redirect()->route('skp.index')->with('pesan', "Hapus data SKP berhasil");
    }
}
