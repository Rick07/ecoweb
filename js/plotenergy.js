$(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container',
                    type: 'column',
                    marginRight: 200,
                    marginBottom: 25
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
                        text: 'Energía'
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
            
            $.getJSON("data", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
                Highcharts.setOptions(Highcharts.theme);
            });
        });