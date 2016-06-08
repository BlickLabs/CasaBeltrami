<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    $sd = $_GET['desc'];
    $st = $_GET['picture_status'];
    $type = $_GET['picture_type'];
    $id = $_GET['category'];
    $cd = date_create();
    $cd = date_format($cd, 'Y-m-d');
    $foto = trim($_FILES['foto']['name']);
    $filename = "";
    if ($_FILES['foto']['size'] <= 2097152) {
        while (true) {
            $filename = uniqid(rand()) . '.' .pathinfo($foto, PATHINFO_EXTENSION);
            if (!file_exists('album/' . $filename)) break;
        }
        $query1 = "INSERT INTO content (tittle,route,description,status,creation_date) VALUES('$title','$filename','$sd',$st,'$cd')";
        $ingresar = mysqli_query($mysqli, $query1);
        try {
        move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $filename);
        $id_img = mysqli_insert_id($mysqli); //obtenemos el id del ultimo insert realizado
        // $mysqli->close(); //cerramos la conexió del primer query
        $query2 = "";
        if ($type == "salon") {
            $query2 = "INSERT INTO content_decoration (id_content,id_decoration) 
                    VALUES (".$id_img.",".$id.")";
                    echo $query2;
        } else if ($type == "servicio") {
            $query2 = "INSERT INTO content_sub_service (id_content,id_sub_service) 
                    VALUES (".$id_img.",".$id.")";
                    echo $query2;
        } else if ($type == "evento") {
            $query2 = "INSERT INTO content_event (id_content,id_event) 
                    VALUES (".$id_img.",".$id.")";
                    echo $query2;
        } else {
            echo "no";
        }
        mysqli_query($mysqli,$query2);
        $mysqli->close();
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }
?>