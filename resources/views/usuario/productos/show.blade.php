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
                <form action="{{url('productosv/'.$producto->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card">
                        <h5 class="card-header"><i class="fa fa-home" aria-hidden="true"></i> Editando Producto</h5>
                        
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <img src="{{asset('/assets/images/fotos/').'/'.$producto->id.'.jpg'}}" alt="" width="400px">
                                    </center>
                                    
                                </div>
                              
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>
                              
                            </div>


                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <select required type="text" class="form-control" id="categoria" name="categoria">
                                            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                            <optgroup></optgroup>
                                            @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="producto">Producto</label>
                                        <input required type="text" class="form-control" id="producto" name="producto" placeholder="Producto" value="{{$producto->producto}}"  maxlength="31">
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input required type="number" class="form-control" id="precio" name="precio" placeholder="Precio" min="0" step="0.01" value="{{$producto->precio}}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea required class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"  maxlength="150">{{$producto->descripcion}}</textarea>
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