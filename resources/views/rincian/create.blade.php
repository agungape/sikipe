@extends('layouts.master')
@section('title', 'SIKIPE')
@section('menuKegiatan','active')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Advanced Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Advanced Form</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Kegiatan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('validation_error')
                        <form action="{{route('rincian.store', $kegiatan)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Waktu Mulai:</label>
                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" name="waktu_mulai" class="form-control datetimepicker-input" data-target="#timepicker" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Waktu Selesai:</label>
                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" name="waktu_mulai" class="form-control datetimepicker-input" data-target="#timepicker" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>SKP</label>
                                {{ Form::select('m_skp_id', $skps, null,['class'=> 'form-control'])}}
                            </div>
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" name="nama" class="form-control" placeholder="Inputkan Nama Pasien">
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diagnosa</label>
                            <input type="text" name="m_diagnosa_id" class="form-control" placeholder="Inputkan Diagnosa">
                        </div>
                        <div class="form-group">
                            <label>Tindakan</label>
                            <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" name="tindakan" rows="4" placeholder="Enter text ..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary" value="Buat Kegiatan">
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(function() {
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
    })
</script>
@endpush