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
                <form action="{{route('rincian.store', $kegiatan)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" class="form-control" value="00:00 AM" />
                    </div>
                    <div class="form-group">
                        <label for="inputName">Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" class="form-control" value="00:00 AM" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">SKP</label>
                        {{ Form::select('m_skp_id', $skps, null,['class'=> 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Nama Pasien</label>
                        <input type="text" name="nama" class="form-control" placeholder="Inputkan Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Diagnosa</label>
                        <input type="text" name="m_diagnosa_id" class="form-control" placeholder="Inputkan Diagnosa">
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Tindakan</label>
                        <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" name="tindakan" rows="4" placeholder="Enter text ..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" value="Buat Kegiatan">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection