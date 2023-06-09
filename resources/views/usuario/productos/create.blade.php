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
                <form action="{{url('productosv')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <h5 class="card-header"><i class="fa fa-home" aria-hidden="true"></i> Nuevo Producto</h5>
                        
                        <div class="card-body">


                        

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input required type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>
                              
                            </div>
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <select required type="text" class="form-control" id="categoria" name="categoria">
                                            <option value="">---Categoría---</option>
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
                                        <input required type="text" class="form-control" id="producto" name="producto" placeholder="Producto" maxlength="31">
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input required type="number" class="form-control" id="precio" name="precio" placeholder="Precio" min="0" step="0.01">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea required class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"  maxlength="150"></textarea>
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