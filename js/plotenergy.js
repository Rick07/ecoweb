//Ǥrafica por día
$(document).ready(function() {
            $("#target").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
      var url = "charts/datosDia";
      var options = {
                chart: {
                    renderTo: 'container',
                    type: 'column',
                    marginRight: 200,
                    marginBottom: 50
                },
                title: {
                    text: 'Gráfica por día',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Energía en KWh'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y + ' KW';
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                
                series: []
            }
            
            $.getJSON(url, function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });
   });
        });

//Ǥrafica por hora
$(document).ready(function() {
            $("#target2").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
      var fecha = $('#fecha').val();
      alert(fecha);
      var url = "charts/datosHora/"+fecha;
      var options = {
                chart: {
                    renderTo: 'container2',
                    type: 'line',
                    marginRight: 200,
                    marginBottom: 50
                },
                title: {
                    text: 'Gráfica por Hora',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Energía en KWh'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y + ' KW';
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                
                series: []
            }
            
            $.getJSON(url, function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });
   });
        });
