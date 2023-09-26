@extends('layouts.master')
@section ('title', 'SPK | Data Prodi')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1>Data Kegiatan Tanggal {{date('d-m-Y', strtotime($kegiatans->tanggal))}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rincian Kegiatan</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<!-- row -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Rincian Kegiatan</h3>
                        <a href="{{route('kegiatan.index')}}" class="btn btn-warning btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                        <a href="{{route('rincian.create', $kegiatans->id_kegiatan)}}" style="margin-right: 10px" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Data </a>

                    </div>
                    <!-- /.card-header -->
                    @include('alert')
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover" id="tabel-rincian">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Kegiatan</th>
                                    <th width="100">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#tabel-rincian').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('rincian.json', $kegiatans->id_kegiatan) }}",
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'waktu_mulai',
                    name: 'waktu_mulai'
                },
                {
                    data: 'tindakan',
                    name: 'tindakan'
                },
                {
                    data: 'action',
                    name: 'action'
                }
                // Kolom-kolom lain yang sesuai dengan kolom yang Anda tambahkan di controller
            ]
        });
    });
</script>
@endpush