<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    $desc = $_GET['desc'];
    $id = $_GET['id_hidden'];
    $cd = date_create();
    $cd = date_format($cd, 'Y-m-d');
    $query = "UPDATE content SET tittle='$title', description='$desc', modification_date='$cd' WHERE id='$id'";
    echo "Anted de ejecutar el query";
    echo "despues de ejecutar el query";
    mysqli_query($mysqli,$query);
    $mysqli->close();

?>
