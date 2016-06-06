<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    $sd = $_GET['desc'];
    $st = $_GET['picture_status'];
    $type = $_GET['picture_type'];
    $id = $_GET['category'];
    $cd = date();
    $cd = date('Y-m-d', $cd);
    $foto = trim($_FILES['foto']['name']);
    $ingresar = mysqli_query($mysqli, "INSERT INTO content (tittle,route,description,status,creation_date)"
                             . "VALUES('$title','$foto','$sd','$st','$cd')");
    move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $foto);
    $id_img = mysqli_insert_id($mysqli); //obtenemos el id del ultimo insert realizado
    $mysqli->close(); //cerramos la conexió del primer query
    $query = "";
    if ($type == "salon") {
        $query = "INSERT INTO content_decoration (id_content,id_decoration) 
                VALUES ('".$id_img."','".$id."')";
    } else if ($type == "servicio") {
        $query = "INSERT INTO content_sub_service (id_content,id_sub_service) 
                VALUES ('".$id_img."','".$id."')";
    } else if ($type == "evento") {
        $query = "INSERT INTO content_event (id_content,id_event) 
                VALUES ('".$id_img."','".$id."')";
    } else {
        echo "no";
    }
    mysqli_query($mysqli2,$query);
    $mysqli2->close();
?>