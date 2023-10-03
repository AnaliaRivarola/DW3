<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="container">
	@if (session('success'))
	<div class="alert alert-success">
	{{session('success')}}	
	</div>
	@endif
        <h1>Listado de Clientes</h1>

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
                    @endif</td>
                    <td>
                <a href="{{ route('eliminar', ['id' => $cliente->id]) }}"
               onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"
               class="btn btn-danger">
                Eliminar
            </a>
                <a href="{{ route('editar', ['id' => $cliente->id]) }}"
               class="btn btn-warning">
                Editar
            </a>


                <a href="{{ route('editar', ['id' => $cliente->id]) }}"
               class="btn btn-info">
                Ver
            </a>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>