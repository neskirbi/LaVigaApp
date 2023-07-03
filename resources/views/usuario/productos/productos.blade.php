<!DOCTYPE html>
<html lang="en">
    
<head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('usuario.header')
    

    <title>Productos</title>
</head>
<body>
    

    @include('usuario.navigation')
    @include('usuario.sidebar')
    @include('toast.toasts') 
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header"><i class="fa fa-home" aria-hidden="true"></i> Productos</h5>
                    <div class="card-body" style="overflow-x:scroll;">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{url('productos/create')}}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Producto</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                        <th>Categoria</th>
                                        <th>Producto</th>
                                        <th>Descripción</th>
                                        <th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productos as $producto)
                                        <tr>
                                            <td>{{$producto->categoria}}</td>
                                            <td>{{$producto->producto}}</td>
                                            <td>{{$producto->descripcion}}</td>
                                            <td><a href="{{url('productos/'.$producto->id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
                                            <td>                                                
                                                <form action="{{url('productos/'.$producto->id)}}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</button>
                                                </form>
                                            </td>
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
    </div>

    
    
</body>
</html>