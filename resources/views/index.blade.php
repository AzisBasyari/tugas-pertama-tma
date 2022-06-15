@extends('layouts.master')

@section('navbar')
    <nav class="bg-main shadow-md">
        <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div>
                    <a class="text-2xl font-bold text-secondary transition-colors duration-500 transform lg:text-3xl hover:text-gray-900"
                        href="/">Data Pengguna</a>
                </div>
            </div>
            <div class="flex flex-row">
                {{-- <a
                    class="my-1 text-sm font-medium text-gray-700 duration-500 mx-2 border-2 border-gray-700 hover:bg-gray-800 hover:text-white px-10 py-2 rounded-full hover:bg-gray-700"
                    href="/register">Daftar</a> --}}
                <a
                    class="my-1 text-sm font-medium text-white duration-500 mx-2 border-2 bg-secondary hover:text-white hover:bg-gray-800 px-10 py-2 rounded-full"
                    href="/login">Login</a>
            </div>
        </div>
    </nav>
@endsection

@section('content')

@endsection

@section('footer')
@endsection
