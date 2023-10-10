<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<style>
    /* Estilo para centrar el elemento h1 */
    h1 {
        text-align: center;
        margin-top: 10vh; /* Coloca el margen superior a la mitad de la altura de la ventana */
        transform: translateY(-50%); /* Corrige la posición vertical */
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
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
        <a href="{{ route('nuevo') }}" class="btn btn-info" style="margin-bottom: 20px">
            Nuevo </a>
        <form action="{{route('buscar')}}" method="GET" class="mb-12">
            <div class="input-group w-90">
                <input type="text" name="buscar" class="form-control" placeholder=" Buscar por nombre"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"> Buscar </button>
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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>CI</th>
                <th>Correo</th>
                <th>Fecha de Nacimiento</th>
                <th>Estado</th>
                <th>Accion</th>
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
</div>