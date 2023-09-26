@extends('layouts.master')
@section('title', 'Mitra')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1>Unit Kerja</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Unit Kerja</li>
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
                        <h3 class="card-title">Tabel Unit Kerja</h3>
                        <a href="{{route ('unitkerja.create')}}" class="btn btn-primary btn-sm float-lg-right"><i class="fas fa-plus"></i> Tambah Data Baru</a>
                    </div>
                    <!-- /.card-header -->
                    @include('alert')
                    <div class="card-body table-responsive">
                        <table class="table table-hover p-1" id="tabel-unitkerja">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit Kerja</th>
                                    <th>Aksi</th>
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
        $('#tabel-unitkerja').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: "{{ route('unitkerja.json') }}",
            columns: [{
                    data: null,
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'unit_kerja',
                    name: 'unit_kerja',

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