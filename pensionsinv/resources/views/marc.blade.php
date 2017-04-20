<select onchange="mostrarResultado(this.value);">
	<option id="api" value="/api/barri/any/2011">2011</option>
	<option id="api" value="/api/barri/any/2012">2012</option>
	<option id="api" value="/api/barri/any/2013">2013</option>
</select>
<div class="resultados">
	<canvas id="grafico"></canvas>
</div>


<script type="text/javascript" src="{{ url('/js/Chart.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
	//var link="www.marc-sola.com/api/barris";
	$(document).ready(alert('selecciona una opcion'));
		function mostrarResultado(link){
			event.preventDefault();
			var v2011 = [];
			var v2012 = [];
			var v2013 = [];
			//var consulta = link;
			var barris = [];
			var dte = [];
			var quantitat = [];
			var anys = [];
			var barr = [];
			$.getJSON(link, function(result){
				$.each(result, function(index, value){
					console.log(value);
					//console.log(index+":"+value["anys"]+":"+JSON.stringify(value));
					if(value["anys"]=="2011"){
					//console.log("iepa!");
						v2011.push(JSON.stringify(value));
						barr.push(JSON.stringify(value["barris"]));
					}else if(value["anys"]=="2012"){
						v2012.push(JSON.stringify(value));
					}else if(value["anys"]=="2013"){
						v2013.push(JSON.stringify(value));
					}
					barris.push(value["barris"]);
					dte.push(value["dte"]);
					quantitat.push(value["quantitat"]);
					anys.push(value["anys"]);
					console.log(v2011);
					//console.log(v2012);
					//console.log(v2013);

				});
				var barChartData = {
					labels: barris,
					datasets: [
						{
							fillColor: "#6b9dfa",
							strokeColor: "#ffffff",
							highlightFill: "#1864f2",
							highlightStroke: "#ffffff",
							data: quantitat
						}
					]
				}
				var ctx = document.getElementById("grafico").getContext("2d");
				window.myPie = new Chart(ctx).Bar(barChartData, {responsive: true});

			});
		}


</script>

