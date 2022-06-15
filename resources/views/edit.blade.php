@extends('adminlte::page')

@section('title', 'Data Pengguna')

@section('content_header')
    <a href="{{ route('home') }}">
        <x-adminlte-button label="Kembali" class="bg-gray-800 text-white hover:bg-gray-900" />
    </a>
    <h1>Data Pengguna</h1>
@stop

@section('content')
    <div id="edit-error" class="w-full bg-red-100 rounded-lg px-4 py-2 text-base text-red-700 error-msg" role="alert"
        style="display: none"></div>
    <div class="row">
        <x-adminlte-input name="name" id="name" label="Nama" placeholder="Nama Lengkap" fgroup-class="col-md-12"
            value="{{ $pengguna->name }}" />
        <div id="name-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
            role="alert" style="display: none"></div>
    </div>

    <div class="row">
        <x-adminlte-select2 name="provinsi" data-placeholder="Pilih Provinsi" label="Provinsi" id="select_province"
            fgroup-class="col-md-12"
            igroup-class=" w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
            <option value="{{ $pengguna->id_provinsi }}" selected>{{ $pengguna->provinsi }}</option>
        </x-adminlte-select2>
        <div id="provinsi-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
            role="alert" style="display: none"></div>
    </div>

    <div class="row">
        <x-adminlte-select2 name="kota" data-placeholder="Pilih Kota/Kabupaten" label="Kota/Kabupaten" id="select_regency"
            fgroup-class="col-md-12"
            igroup-class=" w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
            <option value="{{ $pengguna->id_kota }}" selected>{{ $pengguna->kota }}</option>
        </x-adminlte-select2>
        <div id="kota-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
            role="alert" style="display: none"></div>
    </div>

    <div class="row">
        <x-adminlte-select2 name="kecamatan" data-placeholder="Pilih Kecamatan" label="Kecamatan" id="select_district"
            fgroup-class="col-md-12"
            igroup-class=" w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
            <option value="{{ $pengguna->id_kecamatan }}" selected>{{ $pengguna->kecamatan }}</option>
        </x-adminlte-select2>
        <div id="kecamatan-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
            role="alert" style="display: none"></div>
    </div>

    <div class="d-flex justify-content-end">
        <x-adminlte-button label="Edit" class="bg-gray-800 text-white hover:bg-gray-900" id="btn-edit" />
    </div>
@stop

@section('css')
    <link href="/css/app.css" rel="stylesheet">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // set var id
            let provinceID = $('#select_province').val();
            let regencyID = $('#select_regency').val();
            let districtID = $('#select_district').val();

            //  select province:start
            $('#select_province').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('provinsi') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            //  select province:end

            //  select regency:start
            $('#select_regency').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('kota') }}?provinceID=" + provinceID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            //  select regency:end

            //  select district:start
            $('#select_district').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('kecamatan') }}?regencyID=" + regencyID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            //  select district:end


            //  Event on change select province:start
            $('#select_province').change(function() {
                //clear select
                $('#select_regency').empty();
                $("#select_district").empty();
                //set id
                provinceID = $(this).val();
                if (provinceID) {
                    $('#select_regency').select2({
                        allowClear: true,
                        ajax: {
                            url: "{{ route('kota') }}?provinceID=" + provinceID,
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                            }
                        }
                    });
                } else {
                    $('#select_regency').empty();
                    $("#select_district").empty();
                }
            });
            //  Event on change select province:end

            //  Event on change select regency:start
            $('#select_regency').change(function() {
                //clear select
                $("#select_district").empty();
                //set id
                regencyID = $(this).val();
                if (regencyID) {
                    $('#select_district').select2({
                        allowClear: true,
                        ajax: {
                            url: "{{ route('kecamatan') }}?regencyID=" + regencyID,
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                            }
                        }
                    });
                } else {
                    $("#select_district").empty();
                }
            });
            //  Event on change select regency:end

            // EVENT ON CLEAR
            $('#select_province').on('select2:clear', function(e) {
                $("#select_regency").select2();
                $("#select_district").select2();
            });

            $('#select_regency').on('select2:clear', function(e) {
                $("#select_district").select2();
            });

            $("#btn-edit").click(function() {
                let name = $('#name').val();
                let provinsi = $("select[name='provinsi']").val();
                let kota = $("select[name='kota']").val();
                let kecamatan = $("select[name='kecamatan']").val();
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({

                    url: `/pengguna/{{ $pengguna->id }}`,
                    type: "PUT",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "name": name,
                        "provinsi": provinsi,
                        "kota": kota,
                        "kecamatan": kecamatan,
                        "_token": token
                    },

                    success: function() {
                        window.location.href = "{{ route('home') }}";
                    },

                    error: function(response) {
                        if (response) {
                           if (response.responseJSON?.message != undefined && response.responseJSON.errors == undefined) {
                                $('#edit-error').text(response.responseJSON.message);
                                $("#edit-error").css('display','block');
                           }
                            if (response.responseJSON.errors?.name != undefined) {
                                $('#name-error').text(response.responseJSON.errors.name);
                                $("#name-error").css('display', 'block');
                            }
                            if (response.responseJSON.errors?.provinsi != undefined) {
                                $('#provinsi-error').text(response.responseJSON.errors
                                .provinsi);
                                $("#provinsi-error").css('display', 'block');
                            }
                            if (response.responseJSON.errors?.kota != undefined) {
                                $('#kota-error').text(response.responseJSON.errors.kota);
                                $("#kota-error").css('display', 'block');
                            }
                            if (response.responseJSON.errors?.kecamatan != undefined) {
                                $('#kecamatan-error').text(response.responseJSON.errors
                                    .kecamatan);
                                $("#kecamatan-error").css('display', 'block');
                            }
                        }
                    },
                });
            });
        });
    </script>
@stop
