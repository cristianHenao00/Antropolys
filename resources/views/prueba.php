<?php
    $nameUser = $_POST['name'];
    echo "Nombre = $nameUser <br>";
    $name1User = $_POST['name1'];
    echo "Apellido = $name1User <br>";
    $email = $_POST['email'];
    echo "Correo = $email <br>";
    $pass = $_POST['pass'];
    $passConfi = $_POST['passC'];
    if ($pass == $passConfi) {
        echo "Confirmación Exitosa <br>";
    }else {
        echo "Error al digitar Confirmación <br>";
    }
    $city = $_POST['ciudad'];
    echo "Ciudad = $city <br>";
    $date = $_POST['fecha'];
    echo "Fecha = $date <br>";
    $gender = $_POST['genero'];
    echo "Genero = $gender <br>";
?>