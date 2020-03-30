<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase CLIENTE
////////////////////////////*/

class ClienteDAO 
{
    private $id_cliente;
    private $rut;
    private $razon_social;
    private $email;
    private $telefono;
    private $contacto_personal;
    private $direccion;
    private $plazo;
    private $giro;
    private $comuna;
    private $dtemail;
    private $ciudad;


    public function __construct($id_cliente=null,
                                $rut=null,
                                $razon_social=null,
                                $email=null,
                                $telefono=null,
                                $contacto_personal=null,
                                $direccion=null,
                                $plazo = null,
                                $giro = null,
                                $comuna = null,
                                $dtemail = null,
                                $ciudad = null) {

    $this->id_cliente = $id_cliente;
    $this->rut = $rut;
    $this->razon_social = $razon_social;
    $this->email = $email;
    $this->telefono = $telefono;
    $this->contacto_personal = $contacto_personal;
    $this->direccion = $direccion;
    $this->plazo = $plazo;
    $this->giro = $giro;
    $this->comuna = $comuna;
    $this->dtemail = $dtemail;
    $this->ciudad = $ciudad;
    }

    public function getCli() {
    return $this->id_cliente;
    }


    /*///////////////////////////////////////
    Crear Cliente
    //////////////////////////////////////*/
    public function crear_cliente() {

        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_cli = "INSERT INTO `cliente`(`RUT`,
                                                        `RAZON_SOCIAL`,
                                                        `EMAIL`,
                                                        `TELEFONO`,
                                                        `CONTACTO_PERSONAL`,
                                                        `DIRECCION`,
                                                        `PLAZO_PAGO`,
                                                        `GIRO`,
                                                        `COMUNA_FACTURA`,
                                                        `DTE_EMAIL`,
                                                        `CIUDAD_FACTURA`)
                                VALUES( :rut,
                                        :razon_social,
                                        :email,
                                        :telefono,
                                        :contacto_personal,
                                        :direccion,
                                        :plazopago,
                                        :giro,
                                        :comu_fact,
                                        :dtemail,
                                        :ciudadfact)";


                $stmt = $pdo->prepare($sql_crear_cli);
                $stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR); 
                $stmt->bindParam(":razon_social", $this->razon_social, PDO::PARAM_STR); 
                $stmt->bindParam(":email", $this->email, PDO::PARAM_STR); 
                $stmt->bindParam(":telefono", $this->telefono, PDO::PARAM_STR); 
                $stmt->bindParam(":contacto_personal", $this->contacto_personal, PDO::PARAM_STR); 
                $stmt->bindParam(":direccion", $this->direccion, PDO::PARAM_STR); 
                $stmt->bindParam(":plazopago", $this->plazo, PDO::PARAM_STR); 
                $stmt->bindParam(":giro", $this->giro, PDO::PARAM_STR); 
                $stmt->bindParam(":comu_fact", $this->comuna, PDO::PARAM_STR); 
                $stmt->bindParam(":dtemail", $this->dtemail, PDO::PARAM_STR); 
                $stmt->bindParam(":ciudadfact", $this->ciudad, PDO::PARAM_STR); 
                $stmt->execute();
            
               

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
            }
    }

     /*///////////////////////////////////////
    Modificar Cliente
    //////////////////////////////////////*/
    public function modificar_cliente() {


        try{
    
 
                $pdo = AccesoDB::getCon();

                $sql_mod_cli = "UPDATE `cliente`
                                    SET
                                    `razon_social` =  :razon_social ,
                                    `telefono` =  :telefono ,
                                    `contacto_personal` =  :contacto_personal,
                                    `direccion` =  :direccion,
                                    `email` =  :email,
                                    `plazo_pago` =  :plazopago,
                                    `giro` =  :giro,
                                    `comuna_factura` =  :comu_fact,
                                    `dte_email` =  :dtemail,
                                    `ciudad_factura` =  :ciudadfact       
                                    
                                    WHERE `id_cliente` = :id_cli";




                $stmt = $pdo->prepare($sql_mod_cli);
                //$stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR); 
                $stmt->bindParam(":razon_social", $this->razon_social, PDO::PARAM_STR); 
                $stmt->bindParam(":id_cli", $this->id_cliente, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->email, PDO::PARAM_STR); 
                $stmt->bindParam(":telefono", $this->telefono, PDO::PARAM_STR); 
                $stmt->bindParam(":contacto_personal", $this->contacto_personal, PDO::PARAM_STR); 
                $stmt->bindParam(":direccion", $this->direccion, PDO::PARAM_STR); 
                $stmt->bindParam(":plazopago", $this->plazo, PDO::PARAM_STR); 
                $stmt->bindParam(":giro", $this->giro, PDO::PARAM_STR); 
                $stmt->bindParam(":comu_fact", $this->comuna, PDO::PARAM_STR); 
                $stmt->bindParam(":dtemail", $this->dtemail, PDO::PARAM_STR); 
                $stmt->bindParam(":ciudadfact", $this->ciudad, PDO::PARAM_STR); 
                $stmt->execute();





        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador :".  $e->getMessage()."";
            }
    }
    

}

    ?>