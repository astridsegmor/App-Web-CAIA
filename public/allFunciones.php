<?php
	if(!function_exists("verificar_exist")) {
		function verificar_exist($tabla,$campo1="",$dato1="",$campo2="",$dato2="") {

			require 'openBD.php';
			//$dbconB = mysqli_connect("localhost", "root", "root", "caia_ipasme");

			$expsql= "select * from ".$tabla." where ".$campo1." = '".$dato1."'"; // and ".$campo2." = '".$dato2."'";
//			echo $expsql;
			$consulB=mysqli_query($dbcon,$expsql);
			if (mysqli_num_rows($consulB)!=0) {
				return true;}
			else {
				return false;}
		}
	}

?>