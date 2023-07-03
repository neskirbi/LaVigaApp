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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tienda">Nombre de la tienda</label>
                                    <input required type="text" class="form-control" id="tienda" name="tienda" placeholder="Enter email" value="{{$tienda->tienda}}">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto">Contacto</label>
                                    <input required type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto" value="{{$tienda->contacto}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input required type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{$tienda->telefono}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input required type="mail" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{$tienda->correo}}">
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
                                <a href="{{url('tiendas')}}" class="btn btn-info btn-block">Cancelar</a>
                            </div>

                            <div class="col-md-2">
                                <form action="{{url('EliminarTienda/'.$tienda->id)}}" method="post" >
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