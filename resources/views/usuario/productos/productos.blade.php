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
                    <h5 class="card-header"><i class="fa fa-home" aria-hidden="true"></i> Tiendas</h5>
                    <div class="card-body" style="overflow-x:scroll;">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{url('tiendas/create')}}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Tienda</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                        <th>Tienda</th>
                                        <th>Contacto</th>
                                        <th>Teléfono</th>
                                        <th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tiendas as $tienda)
                                        <tr>
                                            <td>{{$tienda->tienda}}</td>
                                            <td>{{$tienda->contacto}}</td>
                                            <td>{{$tienda->telefono}}</td>
                                            <td><a href="{{url('tiendas/'.$tienda->id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
                                            <td><button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</button></td>
                                        </tr>
                                       
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>

    
    
</body>
</html>