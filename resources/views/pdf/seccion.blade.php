<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maxicomm Ticket</title>
	<style type="text/css">

		html,body{
			font-family: myriad pro;
			font-size: 13px;

		}

		body{
			padding-left: 5rem;
		}
		
		th{
			position: fixed;
		}
		h2, h3, h4, h5 {
			margin: 0;
			display: block;
		}

		small {
			font-size: .8em;
			color: #2e2e2e;
		}

		table.header {
			width: 100%;
			border-collapse: collapse;
			margin: 0px;
			padding: 0px;
		}
		table.header,
		table.header td {
			border-bottom: 1px solid rgba(0,0,0,.1);
		}

		table.header td {
			
		}

		footer {}
		
		.logo {
			display: block;
			border: 0;
			margin: 0;
			width: 50px;
			height: auto;
		}

		.logomaxcont{
		    height: 252px;
		       background-position: center -11px;
		    transform: scale(0.9);
		    position: relative;
		    background-image: url("images/logomaxcont.svg");
		    background-repeat: no-repeat;
		 
		 
		 }

		.ticketborder{
			 padding:2% 0 0 0; 
			 border-top:4px solid #606161; 
			 border-bottom: 4px solid #606161;
			 width: 100%;
		}

		table.intro {
			width: 100%;
			padding: 0px;
			margin-top: 0px;
			/*border-collapse: collapse;*/
			/*border-spacing: 15px;*/
			/*border: 1px solid rgba(0,0,0,.1);*/
		}

		.sombra{
			padding-left: 10px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		.sombra2{
			background: #E5EAE9
			margin-left : 20px;
			padding-left: 10px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		p{
			margin: 0px;
		}

	</style>
</head>
<body>
	<!-- <img src="images/logomaxicont.png" alt="My SVG Icon" width="360" height="58"> -->

	<?php 

	foreach ($valores as $key => $po) { ?>
		
		<img src="images/mxli.png" alt="My SVG Icon" width="100%" height="500px">
	general
	<div>
		<table class="intro">
			<tr>
			    <th style="font-size: 12px">Distrito: <?php echo $po->distrito ?> </th>
			    <th style="font-size: 12px">municipio: <?php echo $po->municipio ?></th>
			    <th style="font-size: 12px">seccion: <?php echo $po->seccion ?></th>
			    <th style="font-size: 12px">habitantes_seccion: <?php echo $po->habitantes_seccion ?></th>
			    
			</tr>
		</table>
		<br/><br/>
		Partidos
		<table class="intro">
			<tr>
				<th style="font-size: 12px">pan: <?php echo $po->p_pan ?> </th>
			    <th style="font-size: 12px">pri: <?php echo $po->p_pri ?></th>
			    <th style="font-size: 12px">morena: <?php echo $po->p_morena ?></th>
			    <th style="font-size: 12px">otros: <?php echo $po->p_otros ?></th>
			</tr>
		</table>
		<br/><br/>
		candidato
		<table class="intro">
			<tr>
				<th style="font-size: 12px">pan: <?php echo $po->c_pan ?></th>
			    <th style="font-size: 12px">pri: <?php echo $po->c_pri ?></th>
			    <th style="font-size: 12px">morena: <?php echo $po->c_morena ?></th>
			    <th style="font-size: 12px">otros: <?php echo $po->c_otros ?></th>
			</tr>	
		</table>
		<br/><br/>
		Preocupaciones
		<table class="intro">
			<tr>
				<th style="font-size: 12px">seguridad: <?php echo $po->seguridad ?></th>
			    <th style="font-size: 12px">Servicios_pulicos: <?php echo $po->servicios_publicos ?></th>
			    <th style="font-size: 12px">empleo: <?php echo $po->empleo ?></th>
			    <th style="font-size: 12px">infraestructura_urbana: <?php echo $po->infraestructura_urbana ?></th>
			</tr>
		</table>
		<table class="intro">
			<tr>
				<th style="font-size: 12px">agua: <?php echo $po->agua ?> </th>
			    <th style="font-size: 12px">gasolina: <?php echo $po->gasolina ?></th>
			    <th style="font-size: 12px">basura: <?php echo $po->basura ?></th>
			    <th style="font-size: 12px">varios: <?php echo $po->varios ?></th>
			</tr>
		</table>
	</div>

	<div style="page-break-after: always;"></div>


	<?php
	}


	?>

</body>
</html>