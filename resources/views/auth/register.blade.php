@extends('layouts.master')

@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('navbar')
    <nav class="bg-main shadow-md">
        <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div>
                    <a class="text-2xl font-bold text-gray-800 transition-colors duration-500 transform lg:text-3xl hover:text-gray-900"
                        href="/">Daftar</a>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <section class="max-w-lg p-6 mt-24 mx-auto text-white bg-gray-800 rounded-xl shadow-xl">
        {{-- <h2 class="text-lg font-semibold capitalize dark:text-white">Masuk</h2> --}}

        {{-- <form method="POST" action={{ route('register.store') }}>
            @csrf --}}
            <div class="grid grid-cols-1 gap-6 mt-4 text-white">
                <div>
                    <label for="name">Nama</label>
                    <input id="name" name="name" type="text" placeholder="Masukkan Nama Anda"
                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring"
                        required>
                    {{-- <div v-if="props.errors.nik" class="bg-red-100 rounded-lg py-2 px-5 text-base text-red-700 mt-3" role="alert">
               {{ errors.nik }}
            </div> --}}
                </div>

                <div>
                    <label for="password">Kata Sandi</label>
                    <input id="password" name="password" type="password" placeholder="Masukkan kata sandi Anda"
                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring"
                        required>
                </div>

                <div>
                    <label for="confirmPassword">Konfirmasi Kata Sandi</label>
                    <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Konfirmasi kata sandi Anda"
                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Provinsi
                    </label>
                    <select id="select_province" name="provinsi" data-placeholder="Select"
                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Kota
                    </label>
                    <select id="select_regency" name="kota" data-placeholder="Select"
                    class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Kecamatan
                    </label>
                    <select id="select_district" name="kecamatan" data-placeholder="Select" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring">
                    </select>

                </div>

                <div class="flex justify-end mt-6">
                    <button id="btn-regis"
                        class="px-6 py-2 leading-5 text-gray-800 font-medium transition-colors duration-200 transform bg-main rounded-lg hover:bg-main focus:outline-none focus:bg-gray-400">Daftar</button>
                </div>
        {{-- </form> --}}
    </section>
@endsection

@section('footer')
@endsection

@section('js')
    <script>
      $(document).ready(function() {
         // set var id
         var provinceID = $('#select_province').val();
         var regencyID = $('#select_regency').val();
         var districtID = $('#select_district').val();

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

         $("#btn-regis").click(function(){
                let name = $('#name').val();
                let password = $('#password').val();
                let confirmPassword = $('#confirmPassword').val();
                let provinsi = $("select[name='provinsi']").val();
                let kota = $("select[name='kota']").val();
                let kecamatan = $("select[name='kecamatan']").val();
                let token = $("meta[name='csrf-token']").attr("content");

                 $.ajax({

                    url: "{{ route('register.store') }}",
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

                    success: function(){
                            window.location.href = "{{ route('login.index') }}";
                    },

                    error: function(response){
                        console.log(response);
                    },
                });
            });
      });
   </script>
@endsection
