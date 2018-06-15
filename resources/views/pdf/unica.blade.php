<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maxicomm Ticket</title>
	<style type="text/css">

		html,body{
			
			font-size: 13px;

		}

		body{
			padding-left: 5rem;
			font-family: Helvetica;
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

		/*table.header {
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
			
		}*/
		
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
			border-collapse: collapse;
			
			/*border-spacing: 15px;*/
			/*border: 1px solid rgba(0,0,0,.1);*/
		}

		table.intro thead th,
		table.intro tbody td {
			padding: 5px;
			border: solid 1px #C4C4C4;
		}

		table.intro thead th {
			text-align: left;
			color: #636363;
		}

		table.intro tbody td {
			background: #E3E3E3;
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

	<h2 style="color: #636363">Sección {{$po->seccion}}</h2><br/>
	<img src=<?=$src?>  width="100%" height="500px">
	<div style="margin-top: 15px;">

		<table class="intro">
			<thead>
				<tr>
					<th colspan=4>GENERAL</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Distrito: <?php echo $po->distrito ?> </td>
					<td>municipio: <?php echo $po->municipio ?></td>
					<td>seccion: <?php echo $po->seccion ?></td>
					<td>habitantes_seccion: <?php echo $po->habitantes_seccion ?></td>
				</tr>
			</tbody>
		</table>

	
		<table class="intro">
			<thead>
				<tr>
					<th colspan=4>PROSPECTOS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="font-size: 12px">pan: <?php echo $po->p_pan ?> </td>
				    <td style="font-size: 12px">pri: <?php echo $po->p_pri ?></td>
				    <td style="font-size: 12px">morena: <?php echo $po->p_morena ?></td>
				    <td style="font-size: 12px">otros: <?php echo $po->p_otros ?></td>
				</tr>
			</tbody>
		</table>
	
		<table class="intro">
			<thead>
				<tr>
					<th colspan=4>CANDIDATOS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="font-size: 12px">pan: <?php echo $po->c_pan ?></td>
				    <td style="font-size: 12px">pri: <?php echo $po->c_pri ?></td>
				    <td style="font-size: 12px">morena: <?php echo $po->c_morena ?></td>
				    <td style="font-size: 12px">otros: <?php echo $po->c_otros ?></td>
				</tr>
			</tbody>	
		</table>
	
		<table class="intro">
			<thead>
				<tr>
					<th colspan=4>PREOCUPACIONES</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="font-size: 12px">seguridad: <?php echo $po->seguridad ?></td>
				    <td style="font-size: 12px">Servicios_pulicos: <?php echo $po->servicios_publicos ?></td>
				    <td style="font-size: 12px">empleo: <?php echo $po->empleo ?></td>
				    <td style="font-size: 12px">infraestructura_urbana: <?php echo $po->infraestructura_urbana ?></td>
				</tr>
				<tr>
					<td style="font-size: 12px">agua: <?php echo $po->agua ?> </td>
				    <td style="font-size: 12px">gasolina: <?php echo $po->gasolina ?></td>
				    <td style="font-size: 12px">basura: <?php echo $po->basura ?></td>
				    <td style="font-size: 12px">varios: <?php echo $po->varios ?></td>
				</tr>
			</tbody>
		</table>

	</div>



</body>
</html>