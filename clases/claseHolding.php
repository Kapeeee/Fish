<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase HOLDING
////////////////////////////*/

class holdingDAO 
{
    private $id_hold;
    private $rut;
    private $razon_social;
    private $email;
    private $telefono;
    private $contacto_personal;
    private $direccion;
    private $giro;
    private $comuna;
    private $ciudad;
    


    public function __construct($id_hold=null,
                                $rut=null,
                                $razon_social=null,
                                $email=null,
                                $telefono=null,
                                $contacto_personal=null,
                                $direccion=null,
                                $giro = null,
                                $comuna = null,
                                $ciudad = null) {      

    $this->id_hold = $id_hold;
    $this->rut = $rut;
    $this->razon_social = $razon_social;
    $this->email = $email;
    $this->telefono = $telefono;
    $this->contacto_personal = $contacto_personal;
    $this->direccion = $direccion;
    $this->giro = $giro;
    $this->comuna = $comuna;
    $this->ciudad = $ciudad;
    }

    public function getHold() {
    return $this->id_hold;
    }


    /*///////////////////////////////////////
    Crear HOLDING
    //////////////////////////////////////*/
    public function crear_holding() {

        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_hold = "INSERT INTO `holding`(`RUT`,
                                                        `RAZON_SOCIAL`,
                                                        `EMAIL`,
                                                        `TELEFONO`,
                                                        `CONTACTO_PERSONAL`,
                                                        `DIRECCION`,
                                                        `GIRO`,
                                                        `COMUNA_FACTURA`,
                                                        `CIUDAD_FACTURA`)
                                VALUES( :rut,
                                        :razon_social,
                                        :email,
                                        :telefono,
                                        :contacto_personal,
                                        :direccion,
                                        :giro,
                                        :comu_fact,
                                        :ciudadfact)";


                $stmt = $pdo->prepare($sql_crear_hold);
                $stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR); 
                $stmt->bindParam(":razon_social", $this->razon_social, PDO::PARAM_STR); 
                $stmt->bindParam(":email", $this->email, PDO::PARAM_STR); 
                $stmt->bindParam(":telefono", $this->telefono, PDO::PARAM_STR); 
                $stmt->bindParam(":contacto_personal", $this->contacto_personal, PDO::PARAM_STR); 
                $stmt->bindParam(":direccion", $this->direccion, PDO::PARAM_STR); 
                $stmt->bindParam(":giro", $this->giro, PDO::PARAM_STR); 
                $stmt->bindParam(":comu_fact", $this->comuna, PDO::PARAM_STR); 
                $stmt->bindParam(":ciudadfact", $this->ciudad, PDO::PARAM_STR);
                $stmt->execute();
            
               

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
            }
    }

     /*///////////////////////////////////////
    Modificar Holding
    //////////////////////////////////////*/
    public function modificar_holding() {


        try{
    
 
            $pdo = AccesoDB::getCon();

            $sql_mod_cli = "UPDATE `holding`
                                SET
                                `razon_social` =  :razon_social ,
                                `telefono` =  :telefono ,
                                `contacto_personal` =  :contacto_personal,
                                `direccion` =  :direccion,
                                `email` =  :email,
                                `giro` =  :giro,
                                `comuna_factura` =  :comu_fact,
                                `ciudad_factura` =  :ciudadfact          
                                
                                WHERE `id_hold` = :id_hold";




            $stmt = $pdo->prepare($sql_mod_cli);
            //$stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR); 
            $stmt->bindParam(":razon_social", $this->razon_social, PDO::PARAM_STR); 
            $stmt->bindParam(":id_hold", $this->id_hold, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR); 
            $stmt->bindParam(":telefono", $this->telefono, PDO::PARAM_STR); 
            $stmt->bindParam(":contacto_personal", $this->contacto_personal, PDO::PARAM_STR); 
            $stmt->bindParam(":direccion", $this->direccion, PDO::PARAM_STR); 
            $stmt->bindParam(":giro", $this->giro, PDO::PARAM_STR); 
            $stmt->bindParam(":comu_fact", $this->comuna, PDO::PARAM_STR); 
            $stmt->bindParam(":ciudadfact", $this->ciudad, PDO::PARAM_STR); 
            $stmt->execute();
        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador :".  $e->getMessage()."";
            }
    }
    

}

    ?>