<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    $sd = $_GET['desc'];
    $st = $_GET['status'];
    $cd = $_GET['creation_date'];
    $decoration = $_GET['decoration'];
    $event = $_GET['event'];
    $id_party = $_GET['salon'];
    $foto = trim($_FILES['foto']['name']);
    $ingresar = mysqli_query($mysqli, "INSERT INTO content (tittle,route,description,status,creation_date)"
                             . "VALUES('$title','$foto','$sd','$st','$cd')");
    move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $foto);
    $id_img = mysqli_insert_id($mysqli3); //obtenemos el id del ultimo insert realizado
    $mysqli3->close(); //cerramos la conexió del primer query
         $sub_service = $_GET['sub_service'];
     if ($sub_service){
        foreach ($sub_service as $s){
            if($s ==1  ){
                $service=1;
            }elseif($s == 2){
                $service = 1;
            }elseif($s== 3){
                $service =1;
            }
            elseif($s== 4){
                $service =2;
            }
            elseif($s== 5){
                $service =2;
            }
            elseif($s== 6){
                $service =2;
            }
            elseif($s== 7){
                $service =2;
            }
            elseif($s== 8){
                $service =3;
            }
            elseif($s== 9){
                $service =3;
            }
            elseif($s== 10){
                $service =3;
            }
            elseif($s== 11){
                $service =3;
            }
            mysqli_query($mysqli2,"INSERT INTO content_party_room (id_content,id_party_room,id_decoration,id_service,id_sub_service,id_event) 
                VALUES ('".$id_img."','".$id_party."','".$decoration."','".$service."',".mysqli_real_escape_string($mysqli2,$s).",'".$event."')");
            }
            $mysqli2->close(); 
     
        }
?>