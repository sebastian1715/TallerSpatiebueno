@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar sitio</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Site.update' , $User )}}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                @if (session()->has('mesage'))
                    <div class="alert alert-secces alert-dismissibe fade show" role="alert">
                        {{ session('message') }}
                        <button class="close" type="button" data-dismiss='alert' aria-label="">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Nombre</label>
                        <input type="text" name="name" class="form-control">
                        <small class="text-danger">{{ $errors->first('name') }} </small>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                        <small class="text-danger">{{ $errors->first('email') }} </small>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control">
                        <small class="text-danger">{{ $errors->first('Password') }} </small>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Rol</label>
                        <input type="text" name="rol" class="form-control">
                        <small class="text-danger">{{ $errors->first('rol') }} </small>
                    </div>
                </div>
        </div>

        <div class="container_mio">
            <div class="col-md-12 mt-4 col-lg-1">
                <button class="btn btn-secondary" type="submit">Guardar</button>
            </div>
            <div class="col-md-12 mt-4 col-lg-1">
                <button class="btn btn-primary" type="reset">Cancelar</button>
            </div>

            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font- awesome/5.15.3/css/all.min.css">
    <style>
        <style type="text/css">.btn-file {
            position: relative;
            overflow: hidden;
            width: 100px;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .btn-file i {
            font-size: 23px;
        }

        .imagen img {
            max-width: 10vw;
            max-height: 10vh;
        }
    </style>
    </style>

@stop

@section('js')
     <script>
        function ocultarAlerta() {
            document.querySelector(".alert").style.display = 'none';
        }
        setTimeout(ocultarAlerta, 3000);
                //Vista previa de la imagen

                let vistaPrevia = () => {
                    let leerImg = new FileReader();
                    let id_img = document.getElementById('img-foto');

                    leerImg.onload = () => {
                        if (leerImg.readyState == 2) {
                            id_img.src = leerImg.result;
                        }
                    }
                    leerImg.readAsDataURL(event.target.files[0])
                }
    </script> 
    
@stop
