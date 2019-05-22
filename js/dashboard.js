$(document).ready(function (){
	$.ajax({
		url : "https://adasecurity.fr/php/chart.php",
		type : "GET",
		success : function(data){
			console.log(data);
      var temps = [];
      var temperature = [];
      var humidity = [];
      var CO2 = [];

      for(var i in data) {
    temps.push(data[i].temps);
    temperature.push(data[i].temperature);
    humidity.push(data[i].humidity);
    CO2.push(data[i].CO2);
  }


			var chartdata = {
				labels: temps,
				datasets: [
					{
						label: "Température",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: temperature
					},
					{
						label: "Humidité",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: humidity
					},
					{
						label: "CO2",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: CO2
					}
				]
			};
      $('#recent-purchases-listing').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: ""
        },
        searching: false, paging: false, info: false
      });

			var ctx = $("#cash-deposits-chart");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});
