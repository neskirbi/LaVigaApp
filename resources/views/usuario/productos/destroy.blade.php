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
             
                <div class="card">
                    <h5 class="card-header"><i class="fa fa-times" aria-hidden="true"></i> ¿Eliminar Producto?</h5>
                    
                    <div class="card-body">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <input required type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoría" value="{{$categoria->categoria}}">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="producto">Producto</label>
                                    <input required type="text" class="form-control" id="producto" name="producto" placeholder="Producto" value="{{$producto->producto}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input required type="number" class="form-control" id="precio" name="precio" placeholder="Precio" min="0" step="0.01" value="{{$producto->precio}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea required class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">{{$producto->descripcion}}</textarea>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2">
                                
                            </div>

                            <div class="col-md-2">
                                
                            </div>

                            <div class="col-md-2">
                                
                            </div>

                            <div class="col-md-2">
                                
                            </div>

                            <div class="col-md-2">
                                <a href="{{url('productosv')}}" class="btn btn-info btn-block">Cancelar</a>
                            </div>

                            <div class="col-md-2">
                                <form action="{{url('EliminarProducto/'.$producto->id)}}" method="post" >
                                @csrf
                                    <button class="btn btn-danger btn-block"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
    
</body>
</html>