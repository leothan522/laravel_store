@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Stores</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    <li class="breadcrumb-item active">Tiendas Registradas</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

@endsection

@section('content')
    @livewire('store-component')
@endsection

@section('footer')
    @include('layouts.admin.footer')
@endsection

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@endsection

@section('js')
    <script>
        function cambiarLogo(){
            var pdrs = document.getElementById('customFileLangLogo').files[0].name;
            document.getElementById('infoLogo').innerHTML = pdrs;
        }
        function cambiarImagen(){
            var pdrs = document.getElementById('customFileLangImagen').files[0].name;
            document.getElementById('infoImagen').innerHTML = pdrs;
        }
        console.log('Hi!');
    </script>
@endsection

@section('plugins.Sweetalert2', true)
@section('plugins.Pace', true)
