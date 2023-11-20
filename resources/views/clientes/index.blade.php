<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
@include('clientes.menu')
<style>
    /* Estilo para centrar el elemento h1 */
    h1 {
        text-align: center;
        margin-top: 10vh; /* Coloca el margen superior a la mitad de la altura de la ventana */
        transform: translateY(-50%); /* Corrige la posición vertical */
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        color: rgb(117, 117, 233);
        text-decoration-line:underline;
    
    }

    .pagination {
    display: flex;
    list-style: none;
    justify-content: center;
    margin: 20px 0;
}

</style>


<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <h1>Listado de Clientes</h1>
    <div class="d-flex justify-content-between aling-items-center mb-3">
        <a href="{{ route('nuevo') }}" class="btn" style="margin-bottom: 20px; background-color:rgb(192, 163, 219);">
            Nuevo </a>
        <form action="{{route('buscar')}}" method="GET" class="mb-12">
            <div class="input-group w-90">
                <input type="text" name="buscar" class="form-control" placeholder=" Buscar por nombre"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" style="background-color:rgb(192, 163, 219);" type="submit"> Buscar </button>
                </div>
            </div>
    </div>
    </form>
    @php
    $vacio = isset($vacio) ? $vacio : false;
    @endphp
    @if ($vacio)
    <div class="card">
        <div class="card-body">
            <center><a class="card-text"> No se encontraron resultados para la búsqueda. </a></center>
        </div>
    </div>
    @else

    <table class="table table-bordered" style="text-align: center;">
        <thead>
            <tr style="color: rgb(173, 96, 245)">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>CI</th>
                <th>Correo</th>
                <th>Fecha de Nacimiento</th>
                <th>Estado</th>
                <th>Cargo</th>
                <th>Acción</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id ?? 'NN'}}</td>
                <td>{{ $cliente->nombre ?? 'NN' }}</td>
                <td>{{ $cliente->apellido ?? 'NN' }}</td>
                <td>{{ $cliente->edad ?? 'NN'}}</td>
                <td>{{ $cliente->ci ?? 'NN'}}</td>
                <td>{{ $cliente->correo ?? 'NN' }}</td>
                <td>{{ $cliente->fecha_nac ?? 'NN'}}</td>
                <td>
                    @if ($cliente->estado == 'Activo')
                    <span class="badge badge-primary">{{$cliente->estado}}</span>
                    @elseif ($cliente->estado == 'activo')
                    <span class="badge badge-primary">{{$cliente->estado}}</span>
                    @else
                    <span class="badge badge-warning">{{$cliente->estado}}</span>
                    @endif
                </td>
                <td>{{ $cliente->cargo ?? 'NN'}}</td>
                <td>
                    <a href="{{ route('eliminar', ['id' => $cliente->id]) }}"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"
                        class="btn btn-danger">
                        Eliminar
                    </a>
                    <a href="{{ route('editar', ['id' => $cliente->id]) }}" class="btn btn-warning">
                        Editar
                    </a>


                    <a href="{{ route('ver', ['id' => $cliente->id]) }}" class="btn btn-info">
                        Ver
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    {{$clientes->links()}}
</div>