$(document).ready(function() {
	$.ajax({
		url:"http://localhost/nutriversion/index.php/Cliente/Ver_grafico_peso_data",
		method:"GET",
		success: function(data){
			console.log(data);
			var fecha = [];
			var peso = [];
			for(var i in data){
				fecha.push("Fecha " + data[i].fecha);
				peso.push(data[i].peso);
			}
			
			var chartdata = {
				labels:fecha,
				datasets: [
				{
					label:'Evolucion de Peso',
					backgroundColor: 'rgba(200,200,200,0.75)',
					borderColor: 'rgba(200,200,200,0.75)',
					hoverBackgroundColor:'rgba(200,200,200,1)',
					hoverBorderColor:'rgba(200,200,200,1)',
					data:peso
				}
			]
		};
			
			var ctx = $("#mycanvas");
			
			var barGraph = new Chart(ctx,{
				type: 'bar',
				data: chartdata
			});
		
		},
		error: function(data) {
			console.log(data);
		}
	});
});


