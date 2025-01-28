<?php 
//$cedula=$_GET['cedulaA']; //echo $cedula;
$cedula = $_POST["CedulaAForm"];
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
		$this->Cell(100,10,utf8_decode('REPORTE DE AFILIADO'),0,1,'C',0);
	//    $this->Image('img/shinheky.png',150,10,35); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->SetFont('Helvetica','B',9);
		$this->setXY(185,45);
		$this->Cell(20,10,'Fecha: '.date("d-m-Y"),0,0,'R');
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
		$this->SetFont('Helvetica','B',12);

		// add text
		//$this->SetFont('Arial', '', 12);
		//$query = "select * from configsis where Cargo=1";
		//$benefA = mysqli_query($dbcon,$query);
		//$user=mysqli_fetch_array($benefA);
		$cedulaX='"'.$cedula.'"'; //echo $cedulaX;
		//$director=$user['Nombre'];
		//$cargo=$user['DescripCargo'];
		$query = "select * from afiliado where cedulaA=".$cedulaX;
		$benefA = mysqli_query($dbcon,$query);
		$user=mysqli_fetch_array($benefA);
		$nombreA=$user['PriApellido']." ".$user['SegApellido']." ".$user['PriNombre']." ".$user['SegNombre'];
		//$tcargo=$user['TipoCargo'];
		//$empleo=$user['CondEmpleo'];
		$this->MultiCell(0, 10, utf8_decode(' Nombre del Afiliado: '.$nombreA), 1, 'J');
		$this->Ln();
		$this->SetFont('Arial','',9);
		$this->SetFillColor(255, 255, 255);//color de fondo rgb
		$this->SetX(15);
//		$this->MultiCell(0, 10, utf8_decode('   Cédula de identidad: '.$cedula), 0, 'J');
		$this->Cell(58,10,utf8_decode(' Cédula de identidad: '.$cedula),'1',0,'L',1);
		$this->Cell(43,10,' Fec.Nacim.: '.date("d-m-Y", strtotime($user['FecNacA'])),'1',0,'L',1);
		$this->Cell(41,10,' Edo.Civil: '.$user["EdoCivil"],'1',0,'L',1);
		$this->Cell(43,10,' Fec.Ingreso: '.date("d-m-Y", strtotime($user["fecIngA"])),'1',1,'L',1);
		$this->SetX(15);
		$this->MultiCell(0, 10, utf8_decode(' Dirección Hab. : '.$user["DirHab"]), 1, 'J');
		$this->SetX(15);
		$this->MultiCell(0, 10, utf8_decode(' Dirección Trab.: '.$user["DirTra"]), 1, 'J');
		$this->SetX(15);
		$this->Cell(74,10,utf8_decode(' E-mail: '.$user["Email"]),'1',0,'L',1);
		$this->Cell(37,10,' Tlf.Cel: '.$user["TlfCel"],'1',0,'L',1);
		$this->Cell(37,10,' Tlf.Hab: '.$user["TlfHab"],'1',0,'L',1);
		$this->Cell(37,10,' Tlf.Trab: '.$user["TlfTrab"],'1',1,'L',1);
		$this->SetX(15);
		$this->Cell(95,10,utf8_decode(' Organismo: '.$user["OrgDepende"]),'1',0,'L',1);
		$this->Cell(41,10,utf8_decode(' Tipo Cargo: '.$user["TipoCargo"]),'1',0,'L',1);
		$this->Cell(49,10,utf8_decode(' Condición Actual: '.$user["CondEmpleo"]),'1',1,'L',1);
		$this->Ln();
		$this->SetX(15);
		$this->SetFont('Arial','B',11);
		$this->Cell(40,10,utf8_decode('BENEFICIARIOS'),0,1,'C',0);
		$this->SetX(15);
		$this->Cell(100,10,utf8_decode('Apellidos y Nombres'),1,0,'C',0);
		$this->Cell(40,10,utf8_decode('Cédula'),1,0,'C',0);
		$this->Cell(40,10,utf8_decode('Parentesco'),1,1,'C',0);
		$this->SetFillColor(233, 229, 235);//color de fondo rgb
		$this->SetDrawColor(61, 61, 61);//color de linea  rgb
//		mysqli_close($dbcon);


		$this->SetFont('Arial','',9);
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
		$this->Cell(10,8,$i,'B',0,'C',1);
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
/*		$this->Cell(170,10,utf8_decode('______________________________'),0,0,'C',0);
		$this->Ln();
		$this->Cell(170,6,utf8_decode('Firma / Sello'),0,0,'C',0);
*/	}
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