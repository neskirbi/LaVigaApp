<div class="navigation-bar">
    <span class="navigation-button">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </span>

    <div class="navigation-options">
        <div class="navigation-option">

        </div>
        <div class="navigation-option">
            
        </div>
        <div class="navigation-option">
            <a href="{{url('carrito')}}" >
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                @if(GetCarritoCount()==0)
                <h6 class="float-right cont-carrito" style="display:none;"><small class="badge badge-danger"> <span class="can-carrito"></span> </small></h6>
                @else
                <h6 class="float-right cont-carrito"><small class="badge badge-danger"> <span class="can-carrito">{{GetCarritoCount()}}</span> </small></h6>
                @endif
            </a>
            
        </div>
    </div>
</div>