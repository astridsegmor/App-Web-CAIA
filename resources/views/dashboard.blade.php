<br><x-app-layout>

<script>
//window.history.replaceState({},'','IpasmeTrujillo.html');

/*window.onload=function(){
	Objeto=document.getElementsByTagName("a");
	for(a=0;a<Objeto.length;a++){
		Objeto[a].onclick=function(){
			location.replace(this.href);
			return false;
		}
	}
}*/
//			font-family: 'Open sans';

</script>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<title>Aplicación WEB Departamento CAIA - UMO TRUJILLO</title>
	<link rel="stylesheet" href="../../CaiaIpasme/public/styles.css">
    <link href="../../CaiaIpasme/public/styleNunito.css" rel="stylesheet">
</head>
<body >
    <nav>
    <div class="cintillo"></div>
    <!-- <img src="../../../proyectoCaia/img/cintilloIpas.jpg"><br>
    </div> -->
    <div class="sp">
        <ul class="menu2">
            <li><a href="#">Afiliado</a>
                <ul class="submenu">
                    <li><a href="{{ url('newAfiliado') }}">Nuevo Afiliado</a></li>  
                    <li><a href="{{ url('modif1Afiliado') }}">Editar Afiliado</a></li>    
                    <li><a href="{{ url('agrega1Benef') }}">Beneficiarios</a></li>           
                    <li><a href="{{ url('emitirCarnet1') }}">Emitir Constancia/Carnet</a></li>           
                    <li><a href="{{ url('act1ReqAfil') }}">Actualizar Requisitos</a></li>    
                    <li><a href="{{ url('agrega1Cred') }}">Créditos Integrados</a></li>    
                    <li><a href="{{ url('agrega1CredH') }}">Créditos Hipotecarios</a></li>    
                </ul>
            </li>
            <li><a href="#">Consultas</a>
                <ul class="submenu">
                    <!--li><a href="conGAfil.php">Consulta General de Afiliados</a></li-->  
                    <li><a href="{{ url('consulAfiliado') }}">Consulta General de Afiliados</a></li>  
                    <li><a href="{{ url('rep1Afiliado') }}">Consulta Individual de Afiliados</a></li>  
                    <li><a href="{{ url('con1Benef') }}">Consulta de Beneficiarios</a></li>    
                    <li><a href="{{ url('con1Cred') }}">Consulta de Créditos</a></li>    
                </ul>
            </li>
            <li><a href="#">Reportes</a>
                <ul class="submenu">
                    <li><a href="../public/verRepGAfil">Reporte General de Afiliados</a></li>
                    <li><a href="{{ url('repo1Benef') }}">Reporte Individual de Afiliados</a></li>  
                    <!--li><a href="repo1Benef.php">Consulta de Beneficiarios</a></li-->    
                    <li><a href="{{ url('repo1Cred') }}">Reporte de Créditos</a></li>    
                </ul>
            </li>
            <!--li><a href="logout.php">Cerrar Sesión</a></li-->
        </ul>           
    </div>
    </nav>
    <!--div class="wrapper"-->
        <div class="fondo">
            <svg viewBox="0 40 1000 55" preserveAspectRatio="none">
                <path d="M0,0V72.94c14.46,5.89,32.38,10.5,54.52.26,110.25-51,120.51,23.71,192.6-4.3,144.73-56.23,154.37,49.44,246.71,4.64C637,4.05,622.19,124.16,757.29,66.21c93-39.91,108.38,54.92,242.71-8.25V0Z" style="fill-rule:evenodd;opacity:0.33;background: #f75e25;"></path>
                <path d="M0,0V52.83c131.11,59.9,147-32.91,239.24,6.65,135.09,58,120.24-62.16,263.46,7.34,92.33,44.8,102-60.88,246.71-4.64,72.1,28,82.35-46.71,192.6,4.3,23.95,11.08,43,4.78,58-1.72V0Z" style="fill-rule:evenodd;opacity:0.66"></path>
                <path d="M0,0V24.26c15.6,6.95,35.77,15.41,61.78,3.38,110.25-51,120.51,23.71,192.6-4.3C399.11-32.89,408.75,72.79,501.08,28,644.3-41.51,629.45,78.6,764.54,20.65,855.87-18.53,872.34,72.12,1000,15.7V0Z" style="fill-rule:evenodd"></path>
            </svg>
            <center>
                <h1 style="font-size:30px; font-family: 'Nunito', sans-serif; font-weight:bold;">Registro y Control de Afiliados</h1><br>
            </center>
        </div><br>
    <!--/div-->
    <footer2>
        <div class="footer-links2">
                <td><p align="center" style="font-size:14px;">UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa</p></td>
        </div>
    </footer2>

</body>
</html>

</x-app-layout>
