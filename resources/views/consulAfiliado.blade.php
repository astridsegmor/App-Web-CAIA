<br><x-app-layout>

<script type="text/javascript">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<title>Aplicación WEB Departamento CAIA - UMO TRUJILLO</title>
	<link rel="stylesheet" href="../../CaiaIpasme/public/styles.css">
	<?php include "../../proyectoCaia/readValid.php"; ?>
    <link href="../../CaiaIpasme/public/styleNunito.css" rel="stylesheet">
</head>
<body style="padding:8px;">
<nav>
        <img src="../../img/cintilloIpas.jpg" alt="fondo"><br>
        <div class="sp">
            <ul>
                <li>
                    <a href="{{ url('dashboard') }}"><h4 style="font-size:16px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">← Regresar</h4></a>
                </li>
            </ul>
        </div>
    </nav>
    <div>
    <!--div style="padding-bottom: auto;">
        <center-->
        <h1 style="font-size:30px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Listado de los Afiliados</h1>
       <!--/center>
    </div-->
    <tabla>
        <center>
		<?php 
		require 'openBD.php';
//		$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
		//mysqli_select_db($conexion,"caia_ipasme");
		$query = 'SELECT cedulaA,prinombre,segnombre,priapellido,segapellido,tlfcel, DirHab, Email, TipoCargo FROM afiliado ORDER BY cedulaA';
//		$query = 'SELECT * FROM afiliado ORDER BY prinombre,segnombre';
		$result = mysqli_query($dbcon,$query) or die('Consulta fallida: ' . mysql_error($conexion));
		?>
		<table class="table table-striped" border="3px" cellspacing="8px"  style="font-size: 12px;">
			<thead>
			<tr >
				<th>CÉDULA</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>TLF CELULAR</th>
				<th>DIRECCIÓN HABITACIÓN</th>
				<th>CORREO ELECTRÓNICO</th>
			</tr>
			</thead>
			<?php 
				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$nomb=$row['prinombre']." ".$row['segnombre'];
				$apell=$row['priapellido']." ".$row['segapellido'];
				?>
					<tr bgcolor="white" >
						<td><?=$row['cedulaA']?></td>
						<td><?=$nomb?></td>
						<td><?=$apell?></td>
						<td><?=$row['tlfcel'] ?></td>
						<td><?=utf8_decode($row['DirHab'])?></td>
						<td><?=$row['Email'] ?></td>
					</tr>
			<?php }
				mysqli_free_result($result); 
				mysqli_close($dbcon); 
			?>
		</table>
       </center>
    </tabla>
    </div>
    <footer2>
        <div class="footer-links2">
                <td><p align="center" style="font-size:14px;">UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
        </div>
    </footer2>

</body>
</html>

</x-app-layout>
