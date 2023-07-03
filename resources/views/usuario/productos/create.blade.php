<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('usuario.header')

    <title>Tiendas</title>
</head>
<body>
    

    @include('usuario.navigation')
    @include('usuario.sidebar')
    @include('toast.toasts') 
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('productos')}}" method="post">
                @csrf
                    <div class="card">
                        <h5 class="card-header"><i class="fa fa-home" aria-hidden="true"></i> Nuevo Producto</h5>
                        
                        <div class="card-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <input required type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoría">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="producto">Producto</label>
                                        <input required type="text" class="form-control" id="producto" name="producto" placeholder="Producto">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea required class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-info float-right">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    
    
</body>
</html>