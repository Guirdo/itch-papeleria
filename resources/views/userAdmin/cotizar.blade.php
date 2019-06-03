@include('layouts.app')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Cotizar</div>

                <div class="card-body">
                    
                    <div class="col">
                        <div>
                            <table class="table">
                                <thead>
                                    <th>Tipo impresion</th>
                                    <th>Rango de paginas</th>
                                    <th>Numero de juegos</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $documento->tipoImpresion }}</td>
                                        <td>{{ $documento->rangoPags }}</td>
                                        <td>{{ $documento->numeroJuegos }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <form method="POST" action="/documentos/{{$documento->id}}">
                                @csrf
                                @method('PATCH')

                                <div class="form-group row">
                                    <label for="cotizacion" class="col-sm-3 col-form-label text-md-left">Cotizacion</label>
                                    <input type="number" name="cotizacion" class="col-sm-2 form-control" value="{{ $documento->cotizacion }}">
                                    <button type="submit" class="ml-5 btn btn-primary col-sm-2">Cotizar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <embed src="http://127.0.0.1:8000{{ Storage::url($documento->nombreArchivo) }}" type="">
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Cotizar</div>

                <div class="card-body">
                    
                    <div class="row">
                        Coizar: 
                    </div>

                    <div>
                    <iframe src="{{ Storage::url($documento->nombreArchivo) }}" frameborder="0"></iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
    
@endsection