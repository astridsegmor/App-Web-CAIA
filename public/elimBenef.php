<?php
 require('openBD.php');
 //variable GET
  echo '<script>alert("Estoy en eliminaBenef.php....");</script>';
  //echo 'Estoy en elimBenef.php....';
  $idBen=$_POST['idbenef'];
  dd($idBen);
 //elimina el registro de la tabla empleados
 /*$sql="DELETE FROM beneficiarios WHERE idBenef=$idBen";
 $resultDel=mysql_query($sql,$dbcon);
 if ($resultDel) {
  echo "Eliminado.... <br>";
 } else {
  echo " No Eliminado.... <br>";
 }*/
 //include('../../CaiaIpasme/public/agregaDBenef');
?>
