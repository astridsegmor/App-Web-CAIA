<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliado;

class AfiliadoController extends Controller
{
	public function elimBenef () {
		//return Request()->cedBenef;
		$idBen=$_GET['idB'];
		$pCedA=$_GET['cedA'];
		require 'openBD.php';
		//return "eliminaBenef_LS..............".$idBen.'....'.$pCedA;
		//return redirect('agregaDBenef',['CedulaAForm'=> $pCedA]);
		return redirect()->back();
		//return to_route('dashboard');
		//return view("eliminaBenef");
	}

	/*public function editAfil($ced)
	{
    	$afil = Afiliado::findOrFail($ced);
		return view('/Modif2Afil');
    //	return view('usuarios.edit' , compact('usuario'));
	}

	public function guardarModifA(Request $request, $ced){	
	//	require 'openBD.php';
//		$conexion = mysqli_connect("localhost", "root", "root", "caia_ipasme");
	//	mysqli_select_db($dbcon,"caia_ipasme");
    //    $mAfil = new mAfil;
		$mafil = mAfil::findOrFail($ced);

		$mAfil->update([
			$mAfil->PriApellido = $request->input("PapellidoForm"),
			$mAfil->SegApellido = $request->input("SapellidoForm"),
			$mAfil->PriNombre = $request->input("PnombreForm"),
			$mAfil->SegNombre = $request->input("SnombreForm"),
			$mAfil->CedulaA = $request->input("CedulaAForm"),
			$mAfil->SexoA = $request->input("Sexo"),
			$mAfil->FecNacA = $request->input("FecNac"),
			$mAfil->EdoCivil = $request->input("EdoCivil"),
			$mAfil->DirHab = $request->input("DirHabForm"),
			$mAfil->DirTrab = $request->input("DirTrabForm"),
			$mAfil->Estado = $request->input("EstadoForm"),
			$mAfil->Municipio = $request->input("McpioForm"),
			$mAfil->Parroquia = $request->input("ParroquiaForm"),
			$mAfil->Ciudad = $request->input("CiudadForm"),
			$mAfil->Email = $request->input("EmailForm"),
			$mAfil->TlfCel = $request->input("TlfCelForm"),
			$mAfil->TlfHab = $request->input("TlfHabForm"),
			$mAfil->TlfTrab = $request->input("TlfTraForm"),
			$mAfil->OrgDepende = $request->input("OrgDep"),
			$mAfil->TipoCargo = $request->input("TipoCargo"),
			$mAfil->CondEmpleo = $request->input("CondEmp"),
			$mAfil->fecIngA = $request->input("Fecing"),
		]);
		// $query = "UPDATE afiliado SET PriApellido='$papellido',SegApellido='$sapellido',PriNombre='$pnombre',SegNombre='$snombre',
		// 			CedulaA='$cedula',SexoA='$sexo',FecNacA='$fecnac',EdoCivil='$edociv',DirHab='$dirh',DirTra='$dirt',Estado='$edo',Municipio='$mpcio',Parroquia='$parroq',
		// 			Ciudad='$ciudad',Email='$email',TlfCel='$tlfcel',TlfHab='$tlfhab',TlfTrab='$tlftra',OrgDepende='$orgdep',TipoCargo='$tipocargo',CondEmpleo='$condemp',fecIngA='$fecIng' 
		// 			WHERE CedulaA='$cedula'";
		// $resultBuscar = mysqli_query($dbcon,$query); // or die('Consulta fallida: '); // . mysql_error($conexion));
		
		// if($resultBuscar)
		// {
		// echo "<strong>Modificación de datos se realizó con éxito...<br>";
		// }
		// else
		// {
		// echo "<strong>Modificación de datos fallida...<br>";
		// }
	}*/
    //
}
