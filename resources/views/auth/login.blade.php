@extends('layouts.master')

@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('navbar')
<nav class="bg-main shadow-md">
    <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-2xl font-bold text-gray-800 transition-colors duration-500 transform lg:text-3xl hover:text-gray-900" href="/">Data Pengguna</a>
            </div>
        </div>
    </div>
</nav>
@endsection

@section('content')
<section class="max-w-lg p-6 mt-24 mx-auto text-white bg-secondary rounded-xl shadow-xl">
    <h2 class="text-lg font-semibold capitalize dark:text-white">Login</h2>
    <div id="login-error" class="w-full bg-red-100 rounded-lg px-4 py-2 text-base text-red-700 error-msg" role="alert" style="display: none"></div>
        <div class="grid grid-cols-1 gap-6 mt-4 text-white">
            <div>
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" placeholder="Masukkan Nama Anda" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                <div id="name-error" class="w-full bg-red-100 rounded-lg px-4 py-2 text-base text-red-700 error-msg" role="alert" style="display: none"></div>
            </div>
        
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Masukkan kata sandi Anda" class="block w-full px-4 py-2 mt-2 bg-white border border-gray-900 text-gray-800 rounded-lg focus:ring-main focus:ring-opacity-40 focus:border-main focus:outline-none focus:ring" required>
                <div id="password-error" class="w-full bg-red-100 rounded-lg px-4 py-2 text-base text-red-700 error-msg" role="alert" style="display: none"></div>
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <button id='btn-login' class="px-6 py-2 leading-5 text-gray-800 font-medium transition-colors duration-200 transform bg-main rounded-lg hover:bg-gray-800 hover:text-white focus:outline-none focus:bg-gray-400">Login</button>
        </div>
</section>
@endsection

@section('footer')
    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $("#btn-login").click(function(){
                let name = $('#name').val();
                let password = $('#password').val();
                let token = $("meta[name='csrf-token']").attr("content");

                 $.ajax({

                    url: "{{ route('login.store') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "name": name,
                        "password": password,
                        "_token": token
                    },

                    success: function(){
                            window.location.href = "{{ route('home') }}";
                    },

                    error: function(response){
                        if(response){
                            if (response.responseJSON?.message != undefined && response.responseJSON.errors == undefined) {
                                $('#login-error').text(response.responseJSON.message);
                                $("#login-error").css('display','block');
                           }
                           if (response.responseJSON.errors?.name != undefined) {
                                $('#name-error').text(response.responseJSON.errors.name);
                                $("#name-error").css('display','block');
                           }
                           if (response.responseJSON.errors?.password != undefined) {
                                $('#password-error').text(response.responseJSON.errors.password);
                                $("#password-error").css('display','block');
                           }
                        }
                    },
                });
            });
        });
    </script>
@endsection