<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase abstracta Persona
////////////////////////////*/

 class PersonaDAO
{
    protected $id;
    protected $rut;
    protected $mail;
    protected $contraseña;
    protected $vigencia;

    /*///////////////////////////////////////
    Login 
    //////////////////////////////////////*/
    public static function login($rut,$pwd){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_login = "select id_usu id, concat(NOM1_USU,' ',APEPAT_USU,' ',APEMAT_USU) nom, mail_usu mail, id_perfil perfil, pass_usu pass, cargo_usu
                                from usuarios where vig_usu = 1 and rut_usu = :rut
                                union all 
                                select id_cli, nom_cli, MAIL_CLI, 0, pass_cli, 0
                                from clientes
                                where vig_cli= 1 and rut_cli = :rut ";

                $stmt = $pdo->prepare($sql_login);
                $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
           
                $stmt->execurete();

               

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($pwd == $row["pass"]){
                    session_start();
                        $_SESSION['id_fac'] = $row['id'];
                        $_SESSION['mail_fac'] = $row['mail'];
                        $_SESSION['nom_fac'] = $row['nom'];
                        $_SESSION['perfil_fac'] = $row['perfil'];
                        $_SESSION['cargo_fac'] = $row['cargo_usu'];
                        $_SESSION['start_fac'] = time();
                        $_SESSION['expire_fac'] = $_SESSION['start_fac'] + (5 * 60);
                        
                        if ($row['perfil'] == 0 ) {
                            echo"<script type=\"text/javascript\">      window.location='../paginas_cli/entrenamiento.php';</script>"; 
                        }else  {
                            echo"<script type=\"text/javascript\">       window.location='../paginas_fa/resumen_inicio.php';</script>"; 
                        }
                }else{
                    echo"<script type=\"text/javascript\">alert('Error, favor verifique sus datos e intente nuevamente o comuniquese con Viracocha Factoring para revisar su vigencia.');window.location='../index.html';        </script>"; 
                }
             
 

        

        } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }





 


}



?>





