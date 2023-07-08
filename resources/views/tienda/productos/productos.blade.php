<!DOCTYPE html>
<html lang="en">
    
<head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('tienda.header')
    

    <title>La Viga | Productos</title>
</head>
<body>
    

    @include('tienda.navigation')
    @include('tienda.sidebar')
    @include('toast.toasts') 
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <div class="cat">
                                        <div class="cat-image">
                                            <img width="50px" heigth="50px" src="{{asset('assets/images/iconos/Res.png')}}" alt="">
                                        </div>
                                        <div class="cat-title">Res</div>
                                    </div>
                                    <div class="cat">
                                        <div class="cat-image">
                                            <img width="50px" heigth="50px" src="{{asset('assets/images/iconos/Puerco.png')}}" alt="">
                                        </div>
                                        <div class="cat-title">Puerco</div>
                                    </div>
                                    <div class="cat">
                                        <div class="cat-image">
                                            <img width="50px" heigth="50px" src="{{asset('assets/images/iconos/Pollo.png')}}" alt="">
                                        </div>
                                        <div class="cat-title">Pollo</div>
                                    </div>
                                    <div class="cat">
                                        <div class="cat-image">
                                            <img width="50px" heigth="50px" src="{{asset('assets/images/iconos/Pescado.png')}}" alt="">
                                        </div>
                                        <div class="cat-title">Pescado</div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="barra"></div>
                            </div>
                        </div>
                        <br><br><br>

                        <div class="row">
                            @foreach($productos as $producto)
                            <div class="col-md-3">           
                                <div class="card">
                                    <div class="card-image">
                                        @if(file_exists(public_path('/assets/images/fotos/').'/'.$producto->id.'.jpg'))
                                        <img src="{{asset('/assets/images/fotos/').'/'.$producto->id.'.jpg'}}" class="card-img-top" alt="">
                                        @else
                                        <img src="{{asset('assets/images/iconos/'.$producto->categoria.'.png')}}" class="card-img-top" alt="">
                                        @endif
                                    </div>
                                    
                                
                                    <div class="card-body">
                                    
                                        <div class="producto-title">{{$producto->producto}}</div>
                                        <div class="prducto-descripcion" title="{{$producto->descripcion}}">{{strlen($producto->descripcion)<70 ? $producto->descripcion : mb_substr($producto->descripcion,0,67,"UTF-8").' ...'}}</div>
                                        <div class="Producto-precio">$ {{$producto->precio}}/Kg</div>
                                        
                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" step="0.01" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Kg</span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" > 
                                            <div class="col-md-12"> 
                                                <button type="button" class="btn btn-dark btn-block">AÑADIR AL CARRITO</button>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        $(document).ready(function(){
            $('.card-image').each(function(_this){
                console.log($(this).css('height',$(this).width()+'px'));
            });
        });
    </script>
</body>
</html>