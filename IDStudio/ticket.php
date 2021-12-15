<?php
$conexion = mysql_connect("localhost", "root", "12345678");
if (! $conexion) { dispError(); exit(); }
echo "Cnx = $conexion <br>";
    
# mysql_select_db('NE221', $db_cnx);    # nombre de la BD
mysql_select_db('idstudio', $conexion);
echo "conectado a DB= " . dispError() . "<br>" ;


    //aqui se obtienen las variaables del get todos pueden ser tipo text
    $servicios=$_GET['servicios'];  
    $horario=$_GET['horario'];
    $nombre=$_GET['nombre'];
    $paterno=$_GET['paterno'];
    $materno=$_GET['materno'];
    $email=$_GET['email'];
    $telefono=$_GET['telefono'];
    $fecha=$_GET['fecha'];
    //puedes reescribirlas en cualquier parte del html y concatenar todos los atributos para que se muestre el ticket
    echo $servicios."<br> ".$horario."<br>".$nombre."<br>".$paterno."<br>".$materno."<br>".$email."<br>".$telefono."<br>".$fecha;
    //aqui puede ir la insercion de datos en la DB con los datos anteriores
?>
<html>
    <head>

    </head>
    <body>
        <div>
            <?php
                echo $servicios."<br> ".$horario."<br>".$nombre."<br>".$paterno."<br>".$materno."<br>".$email."<br>".$telefono."<br>".$fecha;
            ?>
        </div>
    </body>
</html>