

<?php 
		function conexion(){
			
			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="bd_transfactor";
/*
			$servidor="localhost";
			$usuario="andescod_ppime";
			$password="MICROmanejo";
			$bd="andescod_transfactor";
*/
			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
	
			return $conexion;
		}

 ?>