<?php 
//$cedula=$_GET['cedulaA']; //echo $cedula;
//$cedula = $_POST["CedulaAForm"];
//$tcredA = $_POST["tcredito"];
//require_once 'multisql.php';
require('../public/fpdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		$this->SetFont('Times','B',20);
		$this->Image('../../img/cintilloIpas.jpg',6,10,270); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->Ln(2);
		$this->SetFont('Helvetica','B',9);
		$this->setXY(250,25);
		$this->Cell(20,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
		$this->SetFont('Times','B',20);
		$this->setXY(70,35);
		$this->Cell(130,10,utf8_decode('LISTADO GENERAL DE AFILIADOS'),0,1,'C',0);
	//    $this->Image('img/shinheky.png',150,10,35); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->SetFont('Helvetica','B',9);
		$this->setXY(250,45);
		$this->Cell(20,10,'Fecha: '.date("d-m-Y"),0,0,'R');
		$this->Ln(2);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		$this->SetX(60);
		// Arial italic 8
		$this->SetFont('Arial','B',10);
		// Número de página
		$this->Cell(170,10,utf8_decode('Unidad Medico Odontológica - Ipasme Trujillo'),0,0,'C',0);
//		$this->Cell(50,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
	}

	function contenido()
	{
		global $cedula;
		require '../public/openBD.php';
		$this->SetX(15);
		$this->SetFont('Helvetica','B',12);

		// add text
		//$this->SetFont('Arial', '', 12);
		//$query = "select * from configsis where Cargo=1";
		//$benefA = mysqli_query($dbcon,$query);
		//$user=mysqli_fetch_array($benefA);
		$cedulaX='"'.$cedula.'"'; //echo $cedulaX;
		//$director=$user['Nombre'];
		//$cargo=$user['DescripCargo'];
		$query = 'SELECT cedulaA,prinombre,segnombre,priapellido,segapellido,tlfcel, DirHab, Email, TipoCargo FROM afiliado ORDER BY cedulaA';
//		$query = "select * from afiliado order by PriApellido";
		$benefA = mysqli_query($dbcon,$query);
//		$user=mysqli_fetch_array($benefA);
		//$tcargo=$user['TipoCargo'];
		//$empleo=$user['CondEmpleo'];
		$this->Ln();
//		$this->SetX(15);
		$this->SetFont('Helvetica','B',10);
		$this->Cell(20,10,utf8_decode('Cédula'),1,0,'C',0);
		$this->Cell(40,10,utf8_decode('Nombres'),1,0,'C',0);
		$this->Cell(40,10,utf8_decode('Apellidos'),1,0,'C',0);
		$this->Cell(22,10,utf8_decode('Tlf.Celular'),1,0,'C',0);
		$this->Cell(73,10,utf8_decode('Dirección Habitación'),1,0,'C',0);
		$this->Cell(70,10,utf8_decode('Correo Electrónico'),1,1,'C',0);
		$this->SetFillColor(233, 229, 235);//color de fondo rgb
		$this->SetDrawColor(61, 61, 61);//color de linea  rgb
//		mysqli_close($dbcon);

		$this->SetFont('Helvetica','',8);

//		$query = 'SELECT cedulaA,prinombre,segnombre,priapellido,segapellido,tlfcel, DirHab, Email, TipoCargo FROM afiliado ORDER BY cedulaA';
		$query = "select * from afiliado order by PriApellido";
		$benefA = mysqli_query($dbcon,$query);
		$i=1;
		while($user=mysqli_fetch_array($benefA)){
//		}
		
//		for($i=1;$i<=5;$i++){
			
			$this->Ln(0.6);
//			$this->setX(15);
		//$this->Cell(10,8,$i,'1',0,'C',1);
		$nombreA=$user['PriNombre']." ".$user['SegNombre'];
		$apelliA=$user['PriApellido']." ".$user['SegApellido'];
		$this->Cell(20,8,$user['CedulaA'],'B',0,'C',1);
		$this->Cell(40,8,utf8_decode($nombreA),'B',0,'L',1);
		$this->Cell(40,8,utf8_decode($apelliA),'B',0,'L',1);
		$this->Cell(22,8,utf8_decode($user['TlfCel']),'B',0,'C',1);
		$this->Cell(73,8,utf8_decode($user['DirHab']),'B',0,'L',1);
		$this->Cell(70,8,utf8_decode($user['Email']),'B',1,'C',1);
//		$this->Cell(40,8,'Xxxxxxxxx','B',1,'C',1);
		$i++;

		}
		$this->Ln();
		$this->Ln();

/*		$this->Cell(170,10,utf8_decode('______________________________'),0,0,'C',0);
		$this->Ln();
		$this->Cell(170,6,utf8_decode('Firma / Sello'),0,0,'C',0);
*/	}
}
// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','Letter');//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage();//añade l apagina / en blanco
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico

$headlen=array(12,10,13,101,40,18,30,35);
$pdf->contenido();


$pdf->Output();
?>