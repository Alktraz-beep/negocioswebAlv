<?php
<<<<<<< HEAD
    $conexion = mysql_connect("localhost", "root", "12345678");
    if (! $conexion) { dispError(); exit(); }
    echo "Cnx = $conexion <br>";
        
    # mysql_select_db('NE221', $db_cnx);    # nombre de la BD
    mysql_select_db('idstudio', $conexion);
=======
$conexion = mysql_connect("localhost", "root", "12345678");
if (! $conexion) { dispError(); exit(); }
echo "Cnx = $conexion <br>";
    
# mysql_select_db('NE221', $db_cnx);    # nombre de la BD
mysql_select_db('idstudio', $conexion);
echo "conectado a DB= " . dispError() . "<br>" ;


>>>>>>> 9c0fc3a65b25ad81f07c6ca7e07ef477ef3273cc
    //aqui se obtienen las variaables del get todos pueden ser tipo text
    $servicios=$_GET['servicios'];  
    $horario=$_GET['horario'];
    $nombre=$_GET['nombre'];
    $paterno=$_GET['paterno'];
    $materno=$_GET['materno'];
    $email=$_GET['email'];
    $telefono=$_GET['tel'];
    $fecha=$_GET['fecha'];

    //envio a DB
    echo $servicios."<br> ".$horario."<br>".$nombre."<br>".$paterno."<br>".$materno."<br>".$email."<br>".$telefono."<br>".$fecha."<br>";
    $res=mysql_query("insert into cita values(null,\"$nombre\",\"$paterno\",\"$materno\",\"$email\",\"$telefono\",\"$fecha\",\"$horario\");");//se hace el insert en cita DESCOMENTAR
    //echo $res." ".mysql_error();//DESCOMENTAR
    $id_cita=mysql_insert_id();
    //echo "<script>console.log(\"id_cita".$id_cita."\");</script>";
    /****INSERTS EN SERVICIO CITAS** */
    $precios=array();
    $servs=explode("-",$servicios);
    foreach($servs as $servicio){
        $result=mysql_query("select servicio_id,precio from servicio where nombre=\"$servicio\" ;");//obtenemos id  y precio de cada servicio
        if(mysql_num_rows($result)>0){
            while($row=mysql_fetch_assoc($result)){
                $id_servicio=$row['servicio_id'];
                array_push($precios,$row['precio']);
                mysql_query("insert into servicio_cita values(null,$id_servicio,$id_cita);");//INSERT en servicio_cita
                echo "<script>console.log(\"id_serv $id_servicio id_cita $id_cita\");</script>";
                
            }
        }else{  
            echo "<script>console.log('0 resultados')</script>";
            echo "<script>console.log(\"$servicio\")</script>";
        }
    }
    //se saca total
    $total=0;
    for($i=0;$i<sizeof($precios);$i++){
        echo $servs[$i]." -".$precios[$i];
        $total+=$precios[$i];
    }
    echo "<br>Total: ".$total;
    
?>
<html>
    <head>

    </head>
    <body>
        <div>
        </div>
    </body>
</html>