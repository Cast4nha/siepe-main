function chartQtdPescaMes() {
	var jsonData = $.ajax({
        url: "pescaMesScript.php",
        dataType: "json",
		data: {ano: ano}
        }).done(function(results){
                	var ctx = document.getElementById('chart_quantmes').getContext('2d');

                	var label = ['Janeiro', 'Feveireiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                	var data=[];
                	  results.forEach(function(packet) {
                	      data.push(packet);
                	    });
                	    
                	var chart = new Chart(ctx, {
                	    type: 'line',
                	    data: {
                	        labels: label,
                	        datasets: [{
                	        	label: "Peso(kg)",
                	            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                	            borderColor: 'rgba(54, 162, 235, 1)',
                	            data: data,
                	        }]
                	    },
        
                	    options: {
                		    responsive: true,
                		    legend: {
                		    	display: false
                		    }
                		    }
                	});
            });
}

function chartQtdPescaComunidade() {

	var jsonData = $.ajax({
        url: "pescaCmdScript.php",
        dataType: "json",
		data: {ano: ano}
        }).done(function(results){
            	var ctx = document.getElementById('chart_quantuser').getContext('2d');

    			var data = [], labels = [];
    			results.forEach(function(packet){
        			labels.push(packet.comunidade);
        			data.push(packet.qtd);
    			});
            	var myChart = new Chart(ctx, {
            	    type: 'horizontalBar',
            	    data: {
            	        labels: labels,
            	        datasets: [{
            	            label: 'Peso(kg)',
            	            data: data,
            	            backgroundColor: [
            	                'rgba(255, 99, 132, 0.2)',
            	                'rgba(54, 162, 235, 0.2)',
            	                'rgba(255, 206, 86, 0.2)',
            	                'rgba(75, 192, 192, 0.2)',
            	                'rgba(153, 102, 255, 0.2)'
            	            ],
            	            borderColor: [
            	                'rgba(255,99,132,1)',
            	                'rgba(54, 162, 235, 1)',
            	                'rgba(255, 206, 86, 1)',
            	                'rgba(75, 192, 192, 1)',
            	                'rgba(153, 102, 255, 1)'
            	            ],
            	            borderWidth: 2
            	        }]
            	    },
            	    options: {
            	       responsive: true,
	           		   legend: {
	           			   display: false
	           		   }
            	    }
            	});
        });
}
function chartQtdPeixesOvados() {
	var jsonData = $.ajax({
        url: "peixesOvadosScript.php",
        dataType: "json"
        }).done(function(results){
            	var ctx = document.getElementById('chart_peixes_ovados').getContext('2d');

    			var data = [], labels = [];
    			results.forEach(function(packet){
        			labels.push(packet.nomepopular);
        			data.push(packet.ovados);
    			});
            	var myChart = new Chart(ctx, {
            	    type: 'horizontalBar',
            	    data: {
            	        labels: labels,
            	        datasets: [{
            	            label: 'Quantidade',
            	            data: data,
            	            backgroundColor: [
            	                'rgba(255, 99, 132, 0.2)',
            	                'rgba(54, 162, 235, 0.2)',
            	                'rgba(255, 206, 86, 0.2)',
            	                'rgba(75, 192, 192, 0.2)',
            	                'rgba(153, 102, 255, 0.2)'
            	            ],
            	            borderColor: [
            	                'rgba(255,99,132,1)',
            	                'rgba(54, 162, 235, 1)',
            	                'rgba(255, 206, 86, 1)',
            	                'rgba(75, 192, 192, 1)',
            	                'rgba(153, 102, 255, 1)'
            	            ],
            	            borderWidth: 2
            	        }]
            	    },
            	    options: {
            	       responsive: true,
	           		   legend: {
	           			   display: false
	           		   }
            	    }
            	});
        });
}
function chartQtdPescaPeixes() {
	var jsonData = $.ajax({
        url: "peixesPescadosScript.php",
        dataType: "json",
		data: {ano: ano}
        }).done(function(results){
            	var ctx = document.getElementById('chart_peixes').getContext('2d');

    			var data = [], labels = [];
    			results.forEach(function(packet){
        			labels.push(packet.nomepopular);
        			data.push(packet.peso);
    			});
            	var myChart = new Chart(ctx, {
            	    type: 'horizontalBar',
            	    data: {
            	        labels: labels,
            	        datasets: [{
            	            label: 'Peso(kg)',
            	            data: data,
            	            backgroundColor: [
            	                'rgba(255, 99, 132, 0.2)',
            	                'rgba(54, 162, 235, 0.2)',
            	                'rgba(255, 206, 86, 0.2)',
            	                'rgba(75, 192, 192, 0.2)',
            	                'rgba(153, 102, 255, 0.2)'
            	            ],
            	            borderColor: [
            	                'rgba(255,99,132,1)',
            	                'rgba(54, 162, 235, 1)',
            	                'rgba(255, 206, 86, 1)',
            	                'rgba(75, 192, 192, 1)',
            	                'rgba(153, 102, 255, 1)'
            	            ],
            	            borderWidth: 2
            	        }]
            	    },
            	    options: {
            	       responsive: true,
	           		   legend: {
	           			   display: false
	           		   }
            	    }
            	});
        });
}
function chartCpueAno() {
	var jsonData = $.ajax({
        url: "cpueAnoScript.php",
        dataType: "json"
        }).done(function(results){
                	var ctx = document.getElementById('chart_cpueano').getContext('2d');

                	var label = [];
                	var data=[];
                	  results.forEach(function(packet) {
                		  label.push(packet.ano);
                	      data.push(packet.cpue);
                	    });
                	    
                	var chart = new Chart(ctx, {
                	    type: 'line',
                	    data: {
                	        labels: label,
                	        datasets: [{
                	            label: "CPUE",
                	            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                	            borderColor: 'rgba(153, 102, 255, 1)',
                	            data: numberDecimalFormat(data),
                	        }]
                	    },
        
                	    options: {
                		    responsive: true,
                		    legend: {
                		    	display: false
                		    }
                		    }
                	});
            });
}

function chartCpueComunidade() {
	var jsonData = $.ajax({
        url: "cpueComunidadeScript.php",
        dataType: "json",
		data: {ano: ano}
        }).done(function(results){
            	var ctx = document.getElementById('chart_cpuecomunidade').getContext('2d');

    			var data = [], labels = [];
    			results.forEach(function(packet){
        			labels.push(packet.comunidade);
        			data.push(packet.cpue);
    			});
            	var myChart = new Chart(ctx, {
            	    type: 'bar',
            	    data: {
            	        labels: labels,
            	        datasets: [{
            	            label: 'CPUE',
            	            data: numberDecimalFormat(data),
            	            backgroundColor: [
            	                'rgba(255, 99, 132, 0.2)',
            	                'rgba(54, 162, 235, 0.2)',
            	                'rgba(255, 206, 86, 0.2)',
            	                'rgba(75, 192, 192, 0.2)',
            	                'rgba(153, 102, 255, 0.2)'
            	            ],
            	            borderColor: [
            	                'rgba(255,99,132,1)',
            	                'rgba(54, 162, 235, 1)',
            	                'rgba(255, 206, 86, 1)',
            	                'rgba(75, 192, 192, 1)',
            	                'rgba(153, 102, 255, 1)'
            	            ],
            	            borderWidth: 2
            	        }]
            	    },
            	    options: {
            	       responsive: true,
	           		    legend: {
	           		    	display: false
	           		    }
            	    }
            	});
        });
}

function numberDecimalFormat(x) {
	var result = [];
	for(i = 0; i < x.length; i++) {
		result.push(parseFloat(x[i]).toFixed(3));
	}
	return result;
}

window.onload = chartQtdPescaMes();
window.onload = chartQtdPescaComunidade();
window.onload = chartQtdPescaPeixes();
window.onload = chartCpueAno();
//window.onload = chartQtdPeixesOvados();
window.onload = chartCpueComunidade();