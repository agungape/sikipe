@extends('layouts.master')
@section('title', 'Mitra')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1>Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kegiatan</li>
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
                        <h3 class="card-title">Tabel Kegiatan</h3>
                        <a href="{{route ('kegiatan.create')}}" class="btn btn-primary btn-sm float-lg-right"><i class="fas fa-plus"></i> Tambah Data Baru</a>
                    </div>
                    <!-- /.card-header -->
                    @include('alert')
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover" id="tabel-kegiatan">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Unit Kerja</th>
                                    <th>Jam Efektif Kerja</th>
                                    <th>Jumlah Kegiatan</th>
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
        $('#tabel-kegiatan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kegiatan.json') }}",
            columns: [{
                    data: 'tanggal_ubah',
                    name: 'tanggal_ubah'
                },
                {
                    data: 'unit_kerja',
                    name: 'unit_kerja'
                },
                {
                    data: 'jam_efektif',
                    name: 'jam_efektif'
                },
                {
                    data: 'jumlah_kegiatan',
                    name: 'jumlah_kegiatan'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
@endpush