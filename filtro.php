
<?php
    include "auth.php";
    if (isset($_POST['consulta'])){ 
       
    $q=$conn->real_escape_string($_POST ['consulta']);
    $query = "SELECT nombre,precio FROM ingredientes WHERE nombre LIKE '%".$q."%' limit 5";
    }
    
    $resultado = $conn -> query ($query);
    
    if($resultado -> num_rows > 0){
        $salida.= "<table><tbody> ";
        while($fila=$resultado->fetch_assoc()){
            $salida.="<tr>
            <td>".$fila['nombre']."</td>
            <td>".$fila['precio']."</td>
            <td><i class='fa-solid fa-circle-plus fa-beat' aria-hidden='true' name='btn' value='".$fila['ing']."'></i></td>
            </tr>";
        }
        $salida.="</tbody></table>";
    }else{
        $salida="<table><tbody><tr><td>Ingrese el pedido</td></tr></tbody></table>";
    }
    echo $salida;

    $conn->close();
?>