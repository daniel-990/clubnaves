<!DOCTYPE html>
<html lang="en">

<head>
    <title>Enviar datos Barcos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h2>Datos Barcos</h2>
    <a href="./enviardatossocios.php">Enviar socios</a>
    <a href="http://localhost/app/">Home</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p><input type="number" name="numerodematricula" placeholder="Numero de Matricula" /></p>
        <p><input type="text" name="nombre" placeholder="Nombre" /></p>
        <select name="sociopatron" id="patronsocio"></select>
        <p><input type="number" name="numerodelamarre" placeholder="Numero del amarre" /></p>
        <p><input type="number" name="cuotapaga" placeholder="Cuota a pagar" /></p>
        <hr>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        fetch('../server/mostrardatos/mostrarsocios.php')
        .then(function (res) {
            return res.json();
        })
        .then(function (data) {
            console.log(data);
                data.map((items) => {
                    let html = `
                        <option class="option" value="${items.id_socio}">${items.id_socio} - ${items.nombre}</option>
                    `;
                $("#patronsocio").append(html);
            })
        })
    </script>
</body>

</html>

<?php 

    require('../server/conexiones.php');

    if($conexion){

        if(isset($_POST)){

            $numerodematricula = $_POST['numerodematricula'];
            $nombre = $_POST['nombre'];
            $numerodelamarre = $_POST['numerodelamarre'];
            $cuotapaga = $_POST['cuotapaga'];
            $sociopatron = $_POST['sociopatron'];

            $sql = "INSERT INTO barcos (numerodematricula, nombre, numerodelamarre, cuotapaga, socio_id) VALUES ('$numerodematricula', '$nombre', '$numerodelamarre', '$cuotapaga', '$sociopatron')";
            
            if($numerodelamarre == '' || $nombre == '' || $numerodelamarre == '' || $cuotapaga == '' || $sociopatron == ''){
                echo 'Campos sin llenar!';
            }else{
                if(mysqli_query($conexion, $sql)){
                    echo 'Enviado los datos: <hr> '.$numerodematricula. '<br>' .$nombre. '<br>' .$numerodelamarre. '<br>' .$cuotapaga. '<br>' .$sociopatron;
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