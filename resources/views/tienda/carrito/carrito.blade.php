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
    <div class="main-content" style="overflow-y:scroll;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito</h5>
                    <div class="card-body">
                        @foreach($productos as $producto)
                        
                        <div class="row"  style="margin-top:20px;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                
                                                @if(file_exists(public_path('/assets/images/fotos/').'/'.$producto->id_producto.'.jpg'))
                                                    <img src="{{asset('/assets/images/fotos/').'/'.$producto->id_producto.'.jpg'}}" class="card-img-top" alt="">
                                                @else
                                                    <img src="{{asset('assets/images/iconos/'.$producto->categoria.'.png')}}" class="card-img-top" alt="">
                                                @endif

                                            </div>
                                            <div class="col-md-9">
                                                <div class="producto-title">{{$producto->producto}}</div>
                                                <div class="prducto-descripcion" title="{{$producto->descripcion}}">
                                                    {{$producto->descripcion}}
                                                </div>
                                                <div class="row">
                                                     
                                                    <div class="col-md-3">
                                                        <div class="Producto-precio">$ {{$producto->precio}}/Kg</div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="input-group mb-3">
                                                            <input disabled type="text" class="form-control"  value="{{$producto->cantidad}}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Kg</span>
                                                            </div>
                                                        </div>
                                                    </div>                                              
                                                    
                                                   
                                                </div>     
                                                                               
                                            </div>                                       
                                        </div>                      
                                    </div> 
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h6 class="card-header">Resumen de compra</h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"><b>Producto</b></div>
                            <div class="col-md-6" style="text-align: right;"><b>Costo </b></div>
                        </div>
                        <?php $total=0; ?>
                        @foreach($productos as $producto)
                        <div class="row">
                            <div class="col-md-6">{{$producto->producto}}</div>
                            <div class="col-md-6 " style="text-align: right;">$ {{number_format($producto->precio*$producto->cantidad,2)}}</div>
                            <?php $total+=$producto->precio*$producto->cantidad; ?>
                        </div>
                        @endforeach
                        <hr>
                        <div class="row">
                            <div class="col-md-6"><b>Total</b></div>
                            <div class="col-md-6" style="text-align: right;"><b>$ {{$total}} </b></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-info btn-block"  data-toggle="modal" data-target="#HacerPedido">Continuar Compra</button>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        $(document).ready(function(){
            $('.card-image').each(function(_this){
               $(this).css('height',$(this).width()+'px');
            });
        });
    </script>
    @include('tienda.carrito.modals.modalpedido')
</body>
</html>