
<!doctype html>
<html>
<head>

 <script src="<?php echo base_url() ?>js/jquery-3.2.0.min.js"></script>

	<script src="<?php echo base_url() ?>js/Chart.js"></script>
    
    <script src="<?php echo base_url() ?>js/graficoPeso.js"></script>

    <style type= "text/css">
	        #chart-container{
				width: 640px;
				height:auto;
			}
	</style>
    
<meta charset="utf-8">
<title>Mi primer grafico con chart.js</title>
</head>

<body>
      <div id ="chart-container" >
           <canvas id="mycanvas"></canvas>
      </div>
</body>
</html>
