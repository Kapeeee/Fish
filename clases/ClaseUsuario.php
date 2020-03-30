<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Usuario
////////////////////////////*/

class UsuarioDAO    
{
    private $ID_USU;
    private $RUT;
    private $NOMBRE;
    private $APELLIDO;
    private $EMAIL;
    private $PASS;
    private $VIGENCIA;
    private $CARGO;
    private $PERFIL;
    private $NICK;


    /*///////////////////////////////////////
    Login 
    //////////////////////////////////////*/
    public static function login($rut,$pwd){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_login = "select id_usu id, concat(nombre,' ',apellido) nom,email,perfil,pass,cargo
                from usuario where vigencia = 1 and rut = :rut";

                $stmt = $pdo->prepare($sql_login);
                $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
           
                $stmt->execute();

               

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($pwd == $row["pass"]){
                    session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['mail'] = $row['email'];
                        $_SESSION['nom'] = $row['nom'];
                        $_SESSION['perfil'] = $row['perfil'];
                        $_SESSION['cargo'] = $row['cargo'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                        
                        echo"<script type=\"text/javascript\">window.location='../pag_usu/listar.php';</script>"; 
                        
                }else{
                    
                   echo"<script type=\"text/javascript\">alert('Error, favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema.');window.location='../index.html';</script>"; 
                }
             
 

        

        } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }





    public function __construct($ID_USU=null,
                                $RUT=null,
                                $NOMBRE=null,
                                $APELLIDO=null,
                                $EMAIL=null,
                                $PASS=null,
                                $VIGENCIA=null,
                                $CARGO=null,
                                $PERFIL=null,
                                $NICK=null) 
                                {


    $this->ID_USU       = $ID_USU;
    $this->RUT          = $RUT;
    $this->NOMBRE       = $NOMBRE;
    $this->APELLIDO     = $APELLIDO;
    $this->EMAIL        = $EMAIL;
    $this->PASS         = $PASS;
    $this->VIGENCIA     = $VIGENCIA;
    $this->CARGO        = $CARGO;
    $this->PERFIL       = $PERFIL;
    $this->NICK         = $NICK;
    }

    public function getUsu() {
    return $this->ID_USU;
    }


    /*///////////////////////////////////////
    Crear Usuario
    //////////////////////////////////////*/
    public function crear_usuario() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_usu = "INSERT INTO `usuario`(`RUT`,`NOMBRE`,`APELLIDO`,`EMAIL`,`PASS`,`VIGENCIA`,`CARGO`,`PERFIL`,`NICK`)
                            VALUES(:rut,:nombre,:apellido,:email,:pass,:vigencia,:cargo,:perfil,:nick);";


                $stmt = $pdo->prepare($sql_crear_usu);
                $stmt->bindParam(":rut", $this->RUT, PDO::PARAM_STR);
                $stmt->bindParam(":nombre", $this->NOMBRE, PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $this->APELLIDO, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":pass", $this->PASS, PDO::PARAM_STR);
                $stmt->bindParam(":vigencia", $this->VIGENCIA, PDO::PARAM_BOOL);
                $stmt->bindParam(":cargo", $this->CARGO, PDO::PARAM_INT);
                $stmt->bindParam(":perfil", $this->PERFIL, PDO::PARAM_INT);
                $stmt->bindParam(":nick", $this->NICK, PDO::PARAM_STR);
                $stmt->execute();
        

            } catch (Exception $e) {
                echo"2";
            }
    }


    /*///////////////////////////////////////
    Modificar Usuario
    //////////////////////////////////////*/
    public function modificar_usuario() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_mod_usu = "UPDATE `usuario`
                                    SET
                                    `NOMBRE` = :nombre,
                                    `APELLIDO` = :apellido,
                                    `EMAIL` = :email,
                                    `VIGENCIA` = :vigencia,
                                    `CARGO` = :cargo,
                                    `PERFIL` = :perfil,
                                    `NICK` = :nick
                                    WHERE `ID_USU` = :id ";


                $stmt = $pdo->prepare($sql_mod_usu);
                $stmt->bindParam(":nombre", $this->NOMBRE, PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $this->APELLIDO, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":vigencia", $this->VIGENCIA, PDO::PARAM_INT);
                $stmt->bindParam(":cargo", $this->CARGO, PDO::PARAM_INT);
                $stmt->bindParam(":perfil", $this->PERFIL, PDO::PARAM_INT);
                $stmt->bindParam(":nick", $this->NICK, PDO::PARAM_STR);
                $stmt->bindParam(":id", $this->ID_USU, PDO::PARAM_INT);
                $stmt->execute();
        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage()."";
            }
    }

    /*///////////////////////////////////////
    Actualizar Contraseña 
    //////////////////////////////////////*/
    public static function actualizar_contraseña($id,$pwd){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_pwd = "update usuario
                set pass = :pwd
                where id_usu = :id";


                
                $stmt = $pdo->prepare($sql_pwd);
                $stmt->bindParam(":pwd", $pwd, PDO::PARAM_STR);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
           
                $stmt->execute();
        

        } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }


}

    ?>