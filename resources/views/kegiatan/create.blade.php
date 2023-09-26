@extends('layouts.master')
@section ('title', 'SPK | Tambah Data Prodi')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact us</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact us</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2>Admin<strong>LTE</strong></h2>
                    <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                        Phone: +1 234 56789012
                    </p>
                </div>
            </div>
            <div class="col-4">
                @include('validation_error')
                {{Form::open(['route' => 'kegiatan.store'])}}
                @csrf
                <div class="form-group">
                    <label for="inputName">Unit Kerja</label>
                    {{ Form::select('m_unitkerja_id', $unit, null,['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    <label for="inputEmail">Jabatan</label>
                    {{ Form::select('m_jabatan_id', $jabatan, null,['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    <label for="inputSubject">PK/BK</label>
                    {{ Form::select('pk_bk',['i'=>'I','ii'=>'II','iii'=>'III','iv'=>'IV'],null,['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    <label for="inputMessage">Tanggal</label>
                    {{Form::date('tanggal', \Carbon\Carbon::now(),['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-primary" value="Buat Kegiatan">
                    <a href="{{route('kegiatan.index')}}" class="btn btn-sm btn-warning"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection