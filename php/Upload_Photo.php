<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    $desc = $_GET['description'];
    $st = $_GET['status'];
    $cd = $_GET['creation_date'];
    $foto = trim($_FILES['foto']['name']);
    $ingresar = mysqli_query($mysqli3, "INSERT INTO content (tittle,route,creation_date)"
                             . "VALUES('$title','$foto','$cd')");
    move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $foto);
    $id_img = mysqli_insert_id($mysqli3); //obtenemos el id del ultimo insert realizado
    $mysqli3->close(); //cerramos la conexió del primer query
    $id_drone=$_GET['drone'];
    $id_category=$_GET['category'];
    //query para relacionar imagen con galeria(s) 
   
            mysqli_query($mysqli2,"INSERT INTO content_dron_category (id_content,id_drone,id_category) 
                VALUES ('".$id_img."','".$id_drone."','".$id_category."')");
           
            $mysqli2->close(); 
       
        
?>