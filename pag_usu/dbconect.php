<?php
// simple conexion a la base de datos
function connect(){
              return new mysqli("localhost","root","","bd_transfactor");
             // return new mysqli("localhost","andescod_ppime","MICROmanejo","andescod_transfactor");
             
       }
       $con = connect();
?>

