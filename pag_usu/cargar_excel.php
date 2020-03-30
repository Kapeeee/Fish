<?php
if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){
 
        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $nombres = "";
                if(isset($Row[0])) {
                    $nombres = mysqli_real_escape_string($con,$Row[0]);
                }
                
                $cargo = "";
                if(isset($Row[1])) {
                    $cargo = mysqli_real_escape_string($con,$Row[1]);
                }
 
                $celular = "";
                if(isset($Row[2])) {
                    $celular = mysqli_real_escape_string($con,$Row[2]);
                }
 
                $descripcion = "";
                if(isset($Row[3])) {
                    $descripcion = mysqli_real_escape_string($con,$Row[3]);
                }
                
                if (!empty($nombres) || !empty($cargo) || !empty($celular) || !empty($descripcion)) {
                    $query = "insert into tbl_productos(nombres,cargo, celular, descripcion) values('".$nombres."','".$cargo."','".$celular."','".$descripcion."')";
                    $resultados = mysqli_query($con, $query);
                
                    if (! empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
?>