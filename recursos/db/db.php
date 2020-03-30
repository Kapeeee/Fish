<?php
	//1.-Crea la clase del acceso de la base de datos.(Dentro de las clases van las funciones)
	class AccesoDB{
		private static $cnPDO =  null;
		//2.-Crear la funcion de obtener la conexión.
		public static function getCon(){
			if( self::$cnPDO == null){
				try{
					 //3.- En esta cambiamos los parametros..el host (de manera local "localhost", dbname..nombre de la base de datos. El usuario y la contraseña.
					self::$cnPDO = new PDO('mysql:host=localhost; dbname=bd_transfactor', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
					//self::$cnPDO = new PDO('mysql:host=localhost; dbname=andescod_transfactor', 'andescod_ppime', 'MICROmanejo', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
					//mysql_query("SET NAMES 'utf8'");
					self::$cnPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$cnPDO->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
					self::$cnPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				} catch (Exception $exo) {
					throw $exo;
				}
			}
			return self::$cnPDO;
		}
	}	
?>