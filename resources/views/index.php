<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<title>Aplicación WEB Departamento CAIA - UMO TRUJILLO</title>
	<link rel="stylesheet" href="..\..\proyectoCaia\styles.css">
</head>
<body onload="deshabilitaBackpage()">

	<script>
	function deshabilitaBackpage(){
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button" //chrome
		window.onhashchange=function(){window.location.hash="";}
	}
	</script>

	<?php

	function verificar_exist($tabla,$campo1="",$dato1="",$numClave=1) {

	require 'openBD.php';

	  $host="localhost";
	  $user="root";
	  $pass="root";
	  $dbname="caia_ipasme";
	  $existeU=null;
	
	//  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
	  //$dbcon = mysqli_connect("localhost", "root", "root", "caia_ipasme");;

	  if ($numClave==2) {
			$expsql= "select * from ".$tabla." where ".$campo1." = '".$dato1."' and ".$campo2." = ".$dato2;
	//		echo $expsql;
		} else {
			$expsql= "select * from ".$tabla." where ".$campo1."='".$dato1."'";
	//		echo $expsql;
		}
		$consul=mysqli_query($dbcon,$expsql);
		if (mysqli_num_rows($consul)!=0) {
			return true;}
		else {
			return false;}
	}

	?>

    <div class="wrapper">
    <header>
        <nav>
        <img src="img/cintilloIpas.jpg" alt="fondo">
        <div class="sp">
            <ul class="menu">
                <li>
                    <a href="index.php"><h4>Inicio</h4></a>
                </li>
                <li>
                    <a href="info.html"><h4>¿Quienes Somos?</h4></a>
                </li>
                <li>
                    <a href="RyA.html"><h4>Registro y Control de Afiliados</h4></a>
                </li>
                <li>
                    <a href="servicios.html"><h4>Servicios</h4></a>
                </li>
            </ul>
        </div>
        </nav>
    </header>
    <cuerpo class="main">
        <div>
                    <h1 style="text-align:center ;">Coordinacion Financiera - Departamento CAIA</h1>
                    <h2 style="text-align:center ;">U M O  -  I P A S M E</h2>
                    <h3 style="text-align: center;">Departamento para el Control y Registro de toda la información relacionada con los Afiliados y sus familiares (Beneficiarios), 
					así como también de facilitarle el acceso a todos los beneficios que ofrece la institución </h3>
        </div>
    </cuerpo>
    <lado1 class="aside aside-1">
        <div class="sesion">
		<form id="verUser" action="" method="post">
		<!--table id="verUser" method="post"-->
            <div class="titulo">
                <h2>Inicio de Sesion</h2>
            </div>
            <div class="corre" align="center">
                <h3>Usuario</h3>
                <input type="text" name="User" autocomplete="off" required>
            </div>
            <div class="clave" align="center">
                <h3>Contraseña</h3>
                <input type="password" name="Passw" id="Passw" autocomplete="off" required>
			</div>
            <div class="boton">
                <hr>
            	<td colspan="3" align="center">
					<!--button onclick="verPass()" class="art-button" style="border-radius: 5px;">Iniciar</button> <br />&nbsp;-->
					<input type="submit" class="art-button" style="border-radius: 5px;" name="Iniciar" value="Iniciar"><br /></br>
            	</td>
				<?php
					if(array_key_exists('Iniciar', $_POST)) {
						$passw=$_POST['Passw'];
							if (verificar_exist("usuarios","password","$passw")) {
								session_start();
								$hora=date("Gi");
								$_SESSION['hora']=$hora;//hora de ultima session para verificar cada hora ! entonces se borra session
								$_SESSION['username']=$passw;
								$menj="Usuario...".$_SESSION['username'];
//								echo $_SESSION['username'];
								echo '<script type="text/javascript" language="JavaScript">
								window.location="administracion.php";
								</script>';
						//		echo "...Voy a Iniciar....";
								
								}
							else {
								echo "Usuario no autorizado....";
							};
					}
				?>
			</div>
		</form>
        </div>
    </lado1>
    <footer class="footer-links">
        <contenido class="footer-container">
            <faceb class="face">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://es-la.facebook.com/IpasmeOficial/">
                        <img class="sppb-img-responsive" src="img/br_f.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </faceb>
            <twix class="twi">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/IpasmeOficial?ref_src=twsrc%5Etfw">
                        <img class="sppb-img-responsive" src="img/br_t_2.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </twix>
            <inst class="ins">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.instagram.com/ipasmeoficialgob/">
                        <img class="sppb-img-responsive" src="img/br-i.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </inst>
            <yout class="you">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.youtube.com/channel/UCLOD_y8VtKYiQW2V8sw589g">
                        <img class="sppb-img-responsive" src="img/br-y.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </yout>
            <tikt class="tik">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.tiktok.com/@ipasme_oficial">
                        <img class="sppb-img-responsive" src="img/br_tt.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </tikt>
        </contenido>

    </footer>
    <footer2 class="footer-links2">
                <td align="center"><p>UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
    </footer2>
    </div>

</body>
</html>