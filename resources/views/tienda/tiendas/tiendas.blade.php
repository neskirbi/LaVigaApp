<!DOCTYPE html>
<html lang="en">
    
<head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('tienda.header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tiendas</title>
</head>
<body>
    

    @include('tienda.navigation')
    @include('tienda.sidebar')
    @include('toast.toasts') 
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">hola</h3>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-success">Hola</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
</body>
</html>