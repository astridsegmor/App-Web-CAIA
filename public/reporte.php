<?php 
$cedula=$_GET['cedulaA']; //echo $cedula;
//require_once 'multisql.php';
require('../public/fpdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		$this->SetFont('Times','B',20);
		$this->Image('../../img/cintilloIpas.jpg',6,10,200); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->setXY(60,35);
		$this->Cell(100,10,utf8_decode('CONSTANCIA DE AFILIACIÓN'),0,1,'C',0);
	//    $this->Image('img/shinheky.png',150,10,35); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->Ln(15);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','B',10);
		// Número de página
		$this->Cell(170,10,utf8_decode('Unidad Medico Odontológica - Ipasme Trujillo'),0,0,'C',0);
		//$this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
	}

	function contenido()
	{
		global $cedula;
		require '../public/openBD.php';
		$this->SetX(15);
		$this->SetFont('Helvetica','',12);

		// add text
		//$this->SetFont('Arial', '', 12);
		$query = "select * from configsis where Cargo=1";
		$benefA = mysqli_query($dbcon,$query);
		$user=mysqli_fetch_array($benefA);
		$cedulaX='"'.$cedula.'"'; //echo $cedulaX;
		$director=$user['Nombre'];
		$cargo=$user['DescripCargo'];
		$query = "select * from afiliado where cedulaA=".$cedulaX;
		$benefA = mysqli_query($dbcon,$query);
		$user=mysqli_fetch_array($benefA);
		$nombreA=$user['PriApellido']." ".$user['SegApellido']." ".$user['PriNombre']." ".$user['SegNombre'];
		$tcargo=$user['TipoCargo'];
		$empleo=$user['CondEmpleo'];
		setlocale(LC_ALL,"es_VE.UTF-8");
		$FecAct = date('d-m-Y');
		$FecAct = date( "d-m-Y", strtotime("$FecAct") );
		$anio = date("Y", strtotime("$FecAct"));
		$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
		$mes = date("n", strtotime("$FecAct"));
		$mes = $meses[$mes - 1];
		$dia = date("d", strtotime("$FecAct"));
		
		$this->MultiCell(0, 10, utf8_decode('   Yo, '.$director.', en mi carácter de '.$cargo.' del Ipasme Trujillo, hago constar que el ciudadano(a) '.$nombreA.', cédula de identidad  N° '.$cedula.'  se encuentra afiliado(a) a esta institución, actualmente se desempeña como  '.$tcargo.'  en condición de  '.$empleo.'.'), 0, 'J');
		$this->Ln();
		$this->SetX(15);
		$this->MultiCell(0, 10, utf8_decode('   Constancia que se emite a petición de parte interesada para los fines de asistencia médico-odontológica que amerite, mientras se hace efectiva la entrega de su carnet por parte de la sede central, a los '.$dia.' días de '.$mes.' del año '.$anio.'.'), 0, 'J');
		$this->Ln();
		$this->SetX(15);
		$this->Cell(40,10,utf8_decode('BENEFICIARIOS'),0,1,'C',0);
		$this->SetX(15);
		$this->Cell(100,10,utf8_decode('Apellidos y Nombres'),1,0,'C',0);
		$this->Cell(40,10,utf8_decode('Cédula'),1,0,'C',0);
		$this->Cell(40,10,utf8_decode('Parentesco'),1,1,'C',0);
		$this->SetFillColor(233, 229, 235);//color de fondo rgb
		$this->SetDrawColor(61, 61, 61);//color de linea  rgb
//		mysqli_close($dbcon);

		$this->SetFont('Arial','',12);

		$query = "select * from beneficiarios where Cedula_A=".$cedulaX;
//		echo $query;
		$benefA = mysqli_query($dbcon,$query); // or die('Consulta fallida: '); // . mysql_error($conexion));
//		$benefA=select("beneficiarios","Cedula_A","V-05.792.181",2);
//		echo "voy...";
		$i=1;
		while($user=mysqli_fetch_array($benefA)){
//		}
		
//		for($i=1;$i<=5;$i++){
			
			$this->Ln(0.6);
			$this->setX(15);
		$this->Cell(10,8,$i,'1',0,'C',1);
		$this->Cell(90,8,$user['Apellidos_Nombres'],'B',0,'L',1);
		$this->Cell(40,8,$user['CedulaB'],'B',0,'C',1);
		$this->Cell(40,8,$user['Parentesco'],'B',1,'C',1);
//		$this->Cell(40,8,'Xxxxxxxxx','B',1,'C',1);
		$i++;

		}
		$this->Ln();

		$this->Ln();
		$this->Ln();
		$this->Ln();
		$this->Cell(170,10,utf8_decode('______________________________'),0,0,'C',0);
		$this->Ln();
		$this->Cell(170,6,utf8_decode('Firma / Sello'),0,0,'C',0);
	}
}
// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage();//añade l apagina / en blanco
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico

$headlen=array(12,10,13,101,40,18,30,35);
$pdf->contenido();


$pdf->Output();
?>