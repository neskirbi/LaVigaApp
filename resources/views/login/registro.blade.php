<!DOCTYPE html>
<html lang="en">
<head>
	@include('header')
    
    <title>{{GetTitle()}}</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    
    @include('navigation')
  
    @include('toast.toasts')  
    
    
    <br>
    <br><br>
    <br>
    <br><br>
    <br>
    <br>
    <center>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h3 class="section-secondary-title">Registro</h3> 
                <form action="{{url('GuardaTienda')}}" method="post">
                    @csrf
                    <div class="form-group">                    
                        <input required type="text" name="tienda" class="form-control" id="tienda" placeholder="Nombre de la Tienda">
                    </div>       
                    <div class="form-group">                    
                        <input required type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres">
                    </div>       
                    <div class="form-group">                    
                        <input required type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos">
                    </div>       
                    <div class="form-group">                    
                        <input required type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfono">
                    </div>      
                    <div class="form-group">                    
                        <input required type="text" name="mail" class="form-control" id="mail" placeholder="Correo">
                    </div>       
                    <div class="form-group">                    
                        <input required type="password" name="pass" class="form-control" id="pass" placeholder="Contraseña" onkeyup="ValidarPassRegistro()">
                    </div>       
                    <div class="form-group">                    
                        <input required type="password" name="pass2" class="form-control" id="pass2" placeholder="Verificar Contraseña" onkeyup="ValidarPassRegistro()">
                    </div>
                    <div class="form-group">                    
                        <button id="guardatienda" type="submite" class="btn btn-primary rounded">Registrar</button>
                    </div>
                </form>       
                
                
                <!--
                <div class="form-group">
                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date">
                </div>
                <div class="form-group">
                <input class="form-control" type="text" placeholder="Readonly input here…" readonly="">
                </div>
                <div class="form-group">
                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                </div>
                <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Example select</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                </div>
                <div class="form-group">
                <select multiple="" class="form-control" id="exampleFormControlSelect2">
                    <option>Example multiple select</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                </div>
                <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Example textarea"></textarea>
                </div>-->
            </div>
            
        </div>
    </center>
    


    @include('footer')
	

</body>
</html>
