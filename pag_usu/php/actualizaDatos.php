<?php 
	require_once "conexion.php";
	$conexion=conexion();

	$id=$_POST['id'];
	$interes=$_POST['interes'];
	$fechapago=$_POST['fechapago'];


	$sql="UPDATE documento set interes_mora='$interes',
								fec_pag_int='$fechapago'
				where id_documento='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>