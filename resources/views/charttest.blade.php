<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Testing side bar</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--jquery and bootstrap and chart js-->
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.js"></script>
</head>
<body>
  <p>Testing pie chart</p>
  <div  class="col-6" width=300 height=200>
    <canvas id="piechart"></canvas>
  </div>
  <div  class="col-6" width=300 height=200>
      <canvas id="linechart"></canvas>
    </div>
  <script>
  $(document).ready(function(){
    //pie chart test
    var ctx = document.getElementById('piechart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'pie',
      data:{
      datasets: [{
					data: [
						10,
						20,
						30
					],
					backgroundColor: [
						'rgb(255,0,0)',
						'rgb(0,255,0)',
						'rgb(0,0,255)'
						
					],
					label: 'manager'
				}],
				labels: [
					'random',
					'employees',
					'machines'
				]
      },
			options: {
				responsive: true
			}
    });

    //line chart test
    var ctx=document.getElementById('linechart').getContext('2d');
    var linechart=new Chart(ctx,{
      type:'line',
      data:{
        datasets:[{
          data:[10,10,20,100,0,-100,0],
          backgroundColor:'rgb(255,0,0)',
          borderColor:'rgb(255,0,0)',
          fill:false
        }],
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      },
      options:{
				responsive: true,
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
    });
  });
  </script>
</body>
</html>