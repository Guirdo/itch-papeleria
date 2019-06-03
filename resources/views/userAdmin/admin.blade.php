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
                    
                    <div class="col justify-content-center">
                        <button type="button" class="col-sm-7 mb-2 btn btn-primary">
                            <a class="text-white" href="/documentos">Lista de espera (impresiones)</a>
                        </button>
                        <button type="button" class="col-sm-7 btn btn-primary">
                            <a class="text-white" href="/recarga">Recarga saldo cliente</a>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>