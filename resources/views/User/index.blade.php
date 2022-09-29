@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listar sitios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">

                <thead>
                    <tr>
                        <th class="scope">Id</th>
                        <th class="scope">Nombre</th>
                        <th class="scope">Email</th>
                        <th class="scope">Rol</th>
                        <th class="scope">Acción</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @foreach ($user->roles as $r)
                            <td>{{$r->name}}</td>
                                @endforeach
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('User.edit', $user) }} "
                                    role="button">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('User.destroy', $user) }}" class="formulario_eliminar"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        img {
            width: 5vw;
            /* ANCHO_IMAGEN */
            border: solid silver 1px;
            height: 5vh;
            /* ALTO_IMAGEN */
            background-position: center center;
            /* Centrado
                    de imagen*/
            background-repeat: no-repeat;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminación satisfactoria!',
                'Tu archivo a sido eliminado.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario_eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Veras que no hay vuelta atras?',
                text: "¡Se eliminara definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                okButtonColor: '#d33',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    //   #3085d6
                }
            })
        });
    </script>


@stop

{{-- Pagina animaciones js
https://sweetalert2.github.io/ --}}
