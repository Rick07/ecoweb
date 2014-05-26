$(document).ready(function(){

    $('#instalaciones').click(function() {  
            $.ajax({  
                url: 'instalaciones',  
                success: function(data) {  
                    $('#seccion').html(data);  
                }  
            });  
        });  
  
    $('#equipos').click(function() {  
        $.ajax({  
            url: 'equipos',  
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