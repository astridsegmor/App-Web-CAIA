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
    <div class="fondo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 40 1000 55" preserveAspectRatio="none">
                <path d="M0,0V72.94c14.46,5.89,32.38,10.5,54.52.26,110.25-51,120.51,23.71,192.6-4.3,144.73-56.23,154.37,49.44,246.71,4.64C637,4.05,622.19,124.16,757.29,66.21c93-39.91,108.38,54.92,242.71-8.25V0Z" style="fill-rule:evenodd;opacity:0.33;background: #f75e25;"></path>
                <path d="M0,0V52.83c131.11,59.9,147-32.91,239.24,6.65,135.09,58,120.24-62.16,263.46,7.34,92.33,44.8,102-60.88,246.71-4.64,72.1,28,82.35-46.71,192.6,4.3,23.95,11.08,43,4.78,58-1.72V0Z" style="fill-rule:evenodd;opacity:0.66"></path>
                <path d="M0,0V24.26c15.6,6.95,35.77,15.41,61.78,3.38,110.25-51,120.51,23.71,192.6-4.3C399.11-32.89,408.75,72.79,501.08,28,644.3-41.51,629.45,78.6,764.54,20.65,855.87-18.53,872.34,72.12,1000,15.7V0Z" style="fill-rule:evenodd"></path>
            </svg>
        <h1 style="font-size:30px; font-family: 'Nunito', sans-serif; font-weight:bold; text-align:center;">Consulta Solicitud de Créditos x Afiliado</h1><br><br>
    </div>
    <div style="padding-bottom: 10px;">
        <center>
		<hr>
		<table>
		  <form action="../../CaiaIpasme/public/con2Cred" method="post">
            @csrf
			 Cedula Afiliado: <input type="text" name="CedulaAForm" id="cedulaB" pattern="[V|E]-[0-9]{2}.[0-9]{3}.[0-9]{3}" title="Ej.-> V-04.333.555, E-21.222.333" 
								style="font-size:16px" placeholder="V-99.999.999" required> <br> <br>
			 <input class="boton" type="submit" style="font-size:16px;border-radius: 5px" value="Mostrar" >
		  </form>
		</table>
		<hr>
       </center>
    </div>
    <footer2>
        <div class="footer-links2">
                <td><p align="center" style="font-size:14px;">UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
        </div>
    </footer2>

</body>
</html>

</x-app-layout>
