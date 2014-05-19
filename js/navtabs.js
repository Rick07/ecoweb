$(document).ready(function(){

    $('#instalaciones').click(function() {  
            $.ajax({  
                url: '',  
                success: function(data) {  
                    $('#seccion').html(data);  
                }  
            });  
        });  
  
    $('#equipos').click(function() {  
        $.ajax({  
            url: 'datos',  
            success: function(data) {  
                $('#seccion').html(data);  
            }  
        });  
    });

    $('#tablero').click(function() {  
        $.ajax({  
            url: 'charts',  
            success: function(data) {  
                $('#seccion').html(data);  
            }  
        });  
    });  
  
});