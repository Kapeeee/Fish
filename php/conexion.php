

<?php 
		function conexion(){
			//self::$cnPDO = new PDO('mysql:host=localhost; dbname=andescod_transfactor', 'andescod_ppime', 'MICROmanejo', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="pruebas";

			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="andescod_transfactor";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}

 ?>