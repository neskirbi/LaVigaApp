$( document ).ready(function(){
    StarsidbarButton();

});
$(window).resize(function() {
     
    $(".navigation-bar").removeAttr('style');
    $(".main-content").removeAttr('style');
  });


function StarsidbarButton(){
    $( ".navigation-button" ).on( "click", function() {

        console.log('ok '+window.screen.availWidth);
        //$(".sidebar").animate({left: '250px'});


        FuncionVentana();

        if($(this).hasClass('activated')){
            
            $(this).removeClass('activated');
            
        }else{
            
            $(this).addClass('activated');
            
        }
        

       
       
    } );
}

function FuncionVentana(){
    
    

    if($( ".navigation-button" ).hasClass('activated')){
            
        $(".sidebar").animate({left: '-250px'},function(){
            $(".sidebar").hide();
           
        });

        
    }else{
                  

        $(".sidebar").show();
        $(".sidebar").animate({left: '0px'},function(){
            
        });

      

    }

    
    $(".navigation-bar").removeAttr('style');
    $(".main-content").removeAttr('style');
    
}


function EscalaVerdes(){
    return ['#7AFE76','#6FF171','#65DA65','#59C359','#50AF52','#489C47','#338D33','#2C7D2E','#2A6F2C','#43F59D','#3FE795','#39CD84'];
}

function EscalaRojos(){
    return ['#FF9056','#FE783F','#F5692B','#DB5E2A','#C75422','#B04D1E','#9F4118','#8F3C16','#813717','#FEC652','#FFB330','#F99F1E'];
}
function Url(){
    if(window.location.origin.includes('localhost') || window.location.origin.includes('192.168')){
        return window.location.origin+'/recitrack/public/';
    }else{
       return window.location.origin+'/';
    }
}


function AppKey(){
    return 'cefa31fdcb2e11ec81768030496e73b5';
}

function desbloqueaclick(boton){    
    $(boton).prop('disabled', false);
}

function bloqueaclick(boton){    
    $(boton).prop('disabled', true);
}

function ValidarPassRegistro(){
    if($('#pass').val().length>0 && $('#pass2').val().length>0){
        if($('#pass').val()!=$('#pass2').val()){
            $('#pass').addClass('is-invalid');
            $('#pass2').addClass('is-invalid');
        } else{
            $('#pass').removeClass('is-invalid');
            $('#pass').addClass('is-valid');
            $('#pass2').removeClass('is-invalid');
            $('#pass2').addClass('is-valid');
        }
    }else{
        $('#pass').removeClass('is-invalid');
        $('#pass2').removeClass('is-invalid');

        $('#pass').removeClass('is-valid');
        $('#pass2').removeClass('is-valid');
    }
    
}


