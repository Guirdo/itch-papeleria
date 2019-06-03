@extends('layouts.app')

@section('content')

@if(Auth::user()->tipoUsuario == 'ADMIN')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista de espera por imprimir
                </div>
                
                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre archivo</th>
                                    <th scope="col">Cotizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $doc)
                                    @if ($doc->cotizacion == 0)
                                        <tr>
                                            <td>{{ $doc->nombreArchivo }}</td>
                                            <td>
                                                <a href="/documentos/{{$doc->id}}">Ver</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                    <div class="card-header">
                        Impresiones por entregar
                    </div>
                    
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre archivo</th>
                                        <th scope="col">Ver archivo</th>
                                        <th scope="col">Entregado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $doc)
                                        @if ($doc->cotizacion > 0)
                                            <tr>
                                                <td>{{ $doc->nombreArchivo }}</td>
                                                <td>
                                                    <a href="/documentos/{{$doc->id}}">Ver</a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="/documentos/{{$doc->id}}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="form-group row">
                                                                <button type="submit" class="btn btn-primary">Entregado</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                </div>
        </div>
    </div>
</div>

@else
    <?php echo 'NEL PERRO' ?>
@endif

@endsection