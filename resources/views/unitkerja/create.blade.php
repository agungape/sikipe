@extends('layouts.master')
@section ('title', 'SPK | Tambah Data Prodi')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
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
                {{Form::open(['route' => 'unitkerja.store'])}}
                @csrf
                <div class="form-group">
                    <label for="inputName">Unit Kerja</label>
                    {{ Form::text('unit_kerja', null,['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-primary" value="Buat Kegiatan">
                    <a href="{{route('unitkerja.index')}}" class="btn btn-sm btn-warning"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection