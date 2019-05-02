<!DOCTYPE html>
<html lang="en">

<head>
    <title>Enviar datos Socios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h2>Datos Socios</h2>
    <a href="./enviardatosbarcos.php">Enviar barcos</a>
    <a href="http://localhost/app/">Home</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p><input type="text" name="nombre" placeholder="Nombre" /></p>
        <p><input type="text" name="apellidos" placeholder="Apellidos" /></p>
        <p>
            <select name="tipodedocumento">
                <option value="none">Elegisr tipo de documentos</option>
                <option value="CC">CC (cedula de ciudadania)</option>
                <option value="CE">CE (Cédula de Extranjería)</option>
                <option value="CEL">CEL (Número móvil)</option>
                <option value="DIE">DIE (Documento de identificación Extranjero)</option>
                <option value="IDC">IDC (Identificador único del cliente)</option>
                <option value="NIT">NIT (Número de Identificación Tributaria)</option>
                <option value="PP">PP (Pasaporte)</option>
                <option value="RC">RC (Registro civil)</option>
            </select>
        </p>
        <p>
        socio?
            <select name="tiposocio">
                <option value="si">si</option>
                <option value="no">no</option>
            </select>
        </p>
        <p><input type="number" name="numerodedocumento" placeholder="Numero de documento" /></p>
        <p><input type="number" name="telefono" placeholder="Telefono" /></p>
        <p><input type="number" name="celular" placeholder="Celular" /></p>
        <hr>
        <button type="submit">Enviar</button>
    </form>
    <br>
</body>

</html>

<?php 

    require('../server/conexiones.php');

    /**
     * tipos de documentos:
     * 
     * CC (cedula de ciudadania)
     * CE (Cédula de Extranjería)
     * CEL (Número móvil)
     * DE (Documento de identificación Extranjero)
     * IDC (Identificador único del cliente)
     * NIT (Número de Identificación Tributaria)
     * PP (Pasaporte)
     * RC (Registro civil)
     * 
     */

    if($conexion){
        if(isset($_POST)){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $tipodedocumento = $_POST['tipodedocumento'];
            $numerodedocumento = $_POST['numerodedocumento'];
            $telefono = $_POST['telefono'];
            $celular = $_POST['celular'];
            $tiposocio = $_POST['tiposocio'];
     
            $sql = "INSERT INTO socios (nombre, apellidos, tipodedocumento, numerodedocumento, telefono, celular, socio) VALUES ('$nombre', '$apellidos', '$tipodedocumento', '$numerodedocumento', '$telefono', '$celular', '$tiposocio')";
            
            if($nombre == '' || $apellidos == '' || $tipodedocumento == '' || $numerodedocumento == '' || $telefono == '' || $celular == '' || $tiposocio == ''){
                echo 'Campos sin llenar!';
            }else{
                if(mysqli_query($conexion, $sql)){
                    echo 'Enviado los datos: <hr> '.$nombre. '<br>' .$apellidos. '<br>' .$tipodedocumento. '<br>' .$numerodedocumento. '<br>' .$telefono. '<br>' .$celular. '<br>' .$tiposocio;
                }else{
                    echo 'no se lograron enviar datos';
                }
                mysqli_close($conexion);     
            }
        }else{
            echo "no se recivieron datos";
        }
    }else{
        echo "revise los datos de conexion";
    }
?>