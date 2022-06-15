@extends('adminlte::page')

@section('title', 'Halaman Utama')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Halaman Utama</h1>
        <x-adminlte-button label="Tambah Data" data-toggle="modal" data-target="#tambahData" class="bg-secondary"
            id='modalTambah' />
    </div>
@stop

@section('content')
    <table id="tbl-pengguna" class="table table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>

    {{-- Tambah Modal --}}
    <div class="">
        <x-adminlte-modal id="tambahData" title="Tambah Data">
            <div id="tambah-error" class="w-full bg-red-100 rounded-lg px-4 py-2 text-base text-red-700 error-msg"
                role="alert" style="display: none"></div>
            <div class="row">
                <x-adminlte-input name="name" id="name" label="Nama" placeholder="Nama Lengkap"
                    fgroup-class="col-md-12" />
                <div id="name-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
                    role="alert" style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-input name="password" id="password" label="Password" placeholder="Password" type="password"
                    fgroup-class="col-md-12" />
                <div id="password-error"
                    class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg" role="alert"
                    style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-input name="confirmPassword" id="confirmPassword" label="Konfirmasi Password"
                    placeholder="Konfirmasi Password" type="password" fgroup-class="col-md-12" />
                <div id="confirmPassword-error"
                    class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg" role="alert"
                    style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-select2 name="provinsi" data-placeholder="Pilih Provinsi" label="Provinsi" id="select_province"
                    fgroup-class="col-md-12"
                    igroup-class="w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                </x-adminlte-select2>
                <div id="provinsi-error"
                    class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg" role="alert"
                    style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-select2 name="kota" data-placeholder="Pilih Kota/Kabupaten" label="Kota/Kabupaten"
                    id="select_regency" fgroup-class="col-md-12"
                    igroup-class="w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                </x-adminlte-select2>
                <div id="kota-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
                    role="alert" style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-select2 name="kecamatan" data-placeholder="Pilih Kecamatan" label="Kecamatan"
                    id="select_district" fgroup-class="col-md-12"
                    igroup-class="w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                </x-adminlte-select2>
                <div id="kecamatan-error"
                    class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg" role="alert"
                    style="display: none"></div>
            </div>

            <x-slot name="footerSlot">
                <div class="d-flex justify-content-end">
                    <x-adminlte-button label="Tambah" class="bg-gray-800 text-white hover:bg-gray-900" id="btn-tambah" />
                </div>
            </x-slot>
        </x-adminlte-modal>
    </div>

    {{-- Edit Modal --}}
    <div class="">
        <x-adminlte-modal id="editData" title="Edit Data">
            <div id="edit-error" class="w-full bg-red-100 rounded-lg px-4 py-2 text-base text-red-700 error-msg"
                role="alert" style="display: none"></div>

            <x-adminlte-input name="id" id="editId" label="ID" placeholder="ID"
                fgroup-class="col-md-12 d-none" />

            <div class="row">
                <x-adminlte-input name="name" id="editName" label="Nama" placeholder="Nama Lengkap"
                    fgroup-class="col-md-12" />
                <div id="name-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
                    role="alert" style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-select2 name="provinsi" data-placeholder="Pilih Provinsi" label="Provinsi"
                    id="select_provinceEdit" fgroup-class="col-md-12"
                    igroup-class=" w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                    {{-- <option value='32' selected>JAWA BARAT</option> --}}
                </x-adminlte-select2>
                <div id="provinsi-error"
                    class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg" role="alert"
                    style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-select2 name="kota" data-placeholder="Pilih Kota/Kabupaten" label="Kota/Kabupaten"
                    id="select_regencyEdit" fgroup-class="col-md-12"
                    igroup-class=" w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                    {{-- <option value="3273" selected>KOTA BANDUNG</option> --}}
                </x-adminlte-select2>
                <div id="kota-error" class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg"
                    role="alert" style="display: none"></div>
            </div>

            <div class="row">
                <x-adminlte-select2 name="kecamatan" data-placeholder="Pilih Kecamatan" label="Kecamatan"
                    id="select_districtEdit" fgroup-class="col-md-12"
                    igroup-class=" w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                    {{-- <option value="3273050" selected>ASTANAANYAR</option> --}}
                </x-adminlte-select2>
                <div id="kecamatan-error"
                    class="w-full bg-red-100 rounded-lg py-2 px-3 mx-2 text-base text-red-700 error-msg" role="alert"
                    style="display: none"></div>
            </div>

            <x-slot name="footerSlot">
                <div class="d-flex justify-content-end">
                    <x-adminlte-button label="Edit" class="bg-gray-800 text-white hover:bg-gray-900" id="btn-edit" />
                </div>
            </x-slot>
        </x-adminlte-modal>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            let table = $('#tbl-pengguna').DataTable({
                ajax: {
                    url: '/pengguna',
                    type: 'GET',
                    dataSrc: 'data',
                    dataType: 'JSON'
                },
                columns: [{
                        data: null
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'provinsi'
                    },
                    {
                        data: 'kota'
                    },
                    {
                        data: 'kecamatan'
                    },
                    {
                        data: null
                    }
                ],
                columnDefs: [{
                    targets: -1,
                    data: null,
                    defaultContent: "<div class='d-flex justify-content-around'><button label='Edit' data-toggle='modal' data-target='#editData' class='btn btn-secondary' id='editModal'>Edit</button><button class='btn btn-danger' id='btn-hapus'>Hapus</button></div>",
                }, ],
            });

            table.on('draw.dt', function() {
                var PageInfo = $('#tbl-pengguna').DataTable().page.info();
                table.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

            $('#tbl-pengguna tbody').on('click', '#editModal', function() {
                let data = table.row($(this).parents('tr')).data();
                let id_edit = data['id'];
                let name_edit = data['name'];
                let id_provinsi = data['id_provinsi'];
                let provinsi_edit = data['provinsi'];
                let id_kota = data['id_kota'];
                let kota_edit = data['kota'];
                let id_kecamatan = data['id_kecamatan'];
                let kecamatan_edit = data['kecamatan'];

                $('#editName').val(name_edit);
                $('#editId').val(id_edit);

                $('#select_provinceEdit').append("<option value='" + id_provinsi +
                    "' selected>" + provinsi_edit + "</option>");
                $('#select_regencyEdit').append("<option value='" + id_kota + "' selected>" +
                    kota_edit + "</option>");
                $('#select_districtEdit').append("<option value='" + id_kecamatan +
                    "' selected>" + kecamatan_edit + "</option>");

                let provinceID = $('#select_provinceEdit').val();
                let regencyID = $('#select_regencyEdit').val();
                let districtID = $('#select_districtEdit').val();

                $('#select_provinceEdit').select2({
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
                $('#select_regencyEdit').select2({
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
                $('#select_districtEdit').select2({
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
                $('#select_provinceEdit').change(function() {
                    //clear select
                    $('#select_regencyEdit').empty();
                    $("#select_districtEdit").empty();
                    //set id
                    provinceID = $(this).val();
                    if (provinceID) {
                        $('#select_regencyEdit').select2({
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
                        $('#select_regencyEdit').empty();
                        $("#select_districtEdit").empty();
                    }
                });
                //  Event on change select province:end

                //  Event on change select regency:start
                $('#select_regencyEdit').change(function() {
                    //clear select
                    $("#select_districtEdit").empty();
                    //set id
                    regencyID = $(this).val();
                    if (regencyID) {
                        $('#select_districtEdit').select2({
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
                        $("#select_districtEdit").empty();
                    }
                });
                //  Event on change select regency:end

                // EVENT ON CLEAR
                $('#select_provinceEdit').on('select2:clear', function(e) {
                    $("#select_regencyEdit").select2();
                    $("#select_districtEdit").select2();
                });

                $('#select_regencyEdit').on('select2:clear', function(e) {
                    $("#select_districtEdit").select2();
                });
            });

            $("#btn-edit").click(function() {
                    let id = $('#editId').val();
                    let name = $('#editName').val();
                    let provinsi = $("#select_provinceEdit").val();
                    let kota = $("#select_regencyEdit").val();
                    let kecamatan = $("#select_districtEdit").val();
                    let token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({

                        url: `/pengguna/${id}`,
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
                                if (response.responseJSON?.message != undefined &&
                                    response.responseJSON.errors == undefined) {
                                    $('#edit-error').text(response.responseJSON
                                    .message);
                                    $("#edit-error").css('display', 'block');
                                }
                                if (response.responseJSON.errors?.name != undefined) {
                                    $('#name-error').text(response.responseJSON.errors
                                        .name);
                                    $("#name-error").css('display', 'block');
                                }
                                if (response.responseJSON.errors?.provinsi !=
                                    undefined) {
                                    $('#provinsi-error').text(response.responseJSON
                                        .errors
                                        .provinsi);
                                    $("#provinsi-error").css('display', 'block');
                                }
                                if (response.responseJSON.errors?.kota != undefined) {
                                    $('#kota-error').text(response.responseJSON.errors
                                        .kota);
                                    $("#kota-error").css('display', 'block');
                                }
                                if (response.responseJSON.errors?.kecamatan !=
                                    undefined) {
                                    $('#kecamatan-error').text(response.responseJSON
                                        .errors
                                        .kecamatan);
                                    $("#kecamatan-error").css('display', 'block');
                                }
                            }
                        },
                    });
                });

            $('#tbl-pengguna tbody').on('click', '#btn-hapus', function() {
                let token = $("meta[name='csrf-token']").attr("content");
                let data = table.row($(this).parents('tr')).data();
                let id = data['id'];

                $.ajax({
                    url: `/pengguna/${id}`,
                    type: "DELETE",
                    dataType: "JSON",
                    cache: false,

                    data: {
                        "_token": token
                    },

                    success: function() {
                        window.location.href = "{{ route('home') }}";
                    },

                    error: function(response) {
                        console.log(response);
                    },
                })
            });

            $('#modalTambah').on('click', function() {
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

                //  Event on change select province:start
                $('#select_province').change(function() {
                    //clear select
                    $('#select_regency').empty();
                    $("#select_district").empty();
                    //set id
                    var provinceID = $(this).val();
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
                    var regencyID = $(this).val();
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
            });

            $("#btn-tambah").click(function() {
                let name = $('#name').val();
                let password = $('#password').val();
                let confirmPassword = $('#confirmPassword').val();
                let provinsi = $("select[name='provinsi']").val();
                let kota = $("select[name='kota']").val();
                let kecamatan = $("select[name='kecamatan']").val();
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({

                    url: "{{ route('pengguna.store') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "name": name,
                        "password": password,
                        "confirmPassword": confirmPassword,
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
                            if (response.responseJSON?.message != undefined && response
                                .responseJSON.errors == undefined) {
                                $('#tambah-error').text(response.responseJSON.message);
                                $("#tambah-error").css('display', 'block');
                            }
                            if (response.responseJSON.errors?.name != undefined) {
                                $('#name-error').text(response.responseJSON.errors.name);
                                $("#name-error").css('display', 'block');
                            }
                            if (response.responseJSON.errors?.password != undefined) {
                                $('#password-error').text(response.responseJSON.errors
                                    .password);
                                $("#password-error").css('display', 'block');
                            }
                            if (response.responseJSON.errors?.confirmPassword != undefined) {
                                $('#confirmPassword-error').text(response.responseJSON.errors
                                    .confirmPassword);
                                $("#confirmPassword-error").css('display', 'block');
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
