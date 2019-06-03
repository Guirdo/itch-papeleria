<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Bienvenido {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Tu saldo es de: <span class="text-success font-weight-bold">${{Auth::user()->saldo}}</span>
                    
                    @if(Auth::user()->numImpresiones == 0)
                        <div class="p-3 mt-2 bg-warning text-dark">Por ser tu primera vez, te prestamos $5 para que hagas tu primer impresión y tendras que pagarlos al recoger tus impresiones.</div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">Mandar a imprimir</div>

                <div class="card-body">
                <form method="POST" action="/documentos" class="colum" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="file" class="col-sm-3 col-form-label text-md-left">
                            Sube tu archivo: 
                        </label>
                        <input type="file" class="col-sm-6 form-control-file" name="file" id="archivo">
                    </div>

                    <div class="form-group row">
                        <label for="tipoImpresion" class="col-sm-3 col-form-label">
                            Tipo de impresión
                        </label>

                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label for="" class="btn btn-primary active">
                                <input type="radio" id="rdBN">B/N
                            </label>
                            
                            <label for="" class="btn btn-primary">
                                <input type="radio" id="rdColor">Color
                            </label>
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label for="rangoPags" class="col-sm-3 col-form-label">
                            Rango de paginas
                        </label>

                        <input id="rangoPags" name="rangoPags" type="text" class="col-sm-7 form-control" placeholder="TODO o 1-9,6-9">
                    </div>

                    <div class="form-group row">
                        <label for=""class="col-sm-3 col-form-label">
                            Numero de juegos
                        </label>
                        <select id="numJuegos" name="numJuegos" class="col-sm-5 form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="col-sm btn btn-primary">Imprimir</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>