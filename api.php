<?php

include "config.php";
//header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ALL);

$id =mysqli_real_escape_string($mysqli,$_GET["id"]);
$event =mysqli_real_escape_string($mysqli2,$_GET["event"]);
$decoration = mysqli_real_escape_string($mysqli3,$_GET["decoration"]);
$service = mysqli_real_escape_string($mysqli4,$_GET["service"]);


//query only by Party Room (ID)
if ($id!=null && empty($event) && empty($decoration) && empty ($service)) {
    echo 'By party room';
        
        $result = $mysqli->query("SELECT id_party_room,party_room_name FROM party_room WHERE id_party_room = '" . $id . "'");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
            $response ['partyRoom'] = array(
                'id_party_room' => $row['id_party_room'],
                'room_name' => $row['party_room_name'],
                'images' => array(),
            );
        }

        $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,d.name_decoration FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN decorations AS d ON d.id_decoration = cpr.id_decoration WHERE cpr.id_party_room ='" . $id ."'");
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $description = mysqli_real_escape_string($mysqli2,$row['description']);
            $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
            $partialImage = array(
                'path' =>  $path,
                'tittle' => $row ['tittle'],
                'description' => $description,
                'decoration' => $row['name_decoration'],
               
            );
            array_push($response['partyRoom']['images'], $partialImage);
        }
        try {
            $json2 = json_encode($response['partyRoom']);
            echo $json2;

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
}   

    elseif ($id!=null && empty ($st) && $decoration!=null && empty ($service)) {
        $result = $mysqli->query("SELECT id_party_room,party_room_name FROM party_room WHERE id_party_room = '" . $id . "'");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $response ['partyRoom'] = array(
                'id_party_room' => $row['id_party_room'],
                'room_name' => $row['party_room_name'],
                'images' => array(),
            );
        }
        $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,d.name_decoration FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN decorations AS d ON d.id_decoration = cpr.id_decoration WHERE cpr.id_party_room ='" . $id . "' AND cpr.id_decoration = '" . $decoration . "' AND d.id_party = '" . $id . "'");
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $description = mysqli_real_escape_string($mysqli2,$row['description']);
            $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
            $partialImage = array(
                'path' =>  $path,
                'tittle' => $row ['tittle'],
                'description' => $description,
                'decoration' => $row['name_decoration']
            );
            array_push($response['partyRoom']['images'], $partialImage);    
        }
        try {
            $json2 = json_encode($response['partyRoom']);
            echo $json2;

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

        
} //query with Events
    elseif (empty ($id) && empty ($decoration) && $event!=null && empty ($service)) {
        $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,e.name_event FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN events AS e ON e.id_event = cpr.id_event WHERE cpr.id_event ='" . $event . "'");
            $response ['partyRoom'] = array(
                'id_party_room' => $row['id_party_room'],
                'images' => array(),
            );
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $description = mysqli_real_escape_string($mysqli2,$row['description']);
            $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
            $partialImage = array(
                'path' =>  $path,
                'tittle' => $row ['tittle'],
                'description' => $description,
                'event' => $row['name_event']
            );
            array_push($response['partyRoom']['images'], $partialImage);
        }
        try {
            $json2 = json_encode($response['partyRoom']);
            echo $json2;

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
}//query with Services
    elseif (empty ($id) && empty ($event)&& empty ($decoration) && $service!=null) {
                $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,s.name_sub_service FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN sub_services AS s ON s.id_sub_service = cpr.id_sub_service WHERE cpr.id_sub_service ='" . $service . "'");
            $response ['partyRoom'] = array(
                'id_party_room' => $row['id_party_room'],
                'images' => array(),
            );
        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $description = mysqli_real_escape_string($mysqli2,$row['description']);
            $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
            $partialImage = array(
                'path' =>  $path,
                'tittle' => $row ['tittle'],
                'description' => $description,
                'subservice' => $row['name_sub_service']
            );
            array_push($response['partyRoom']['images'], $partialImage);
        }
        try {
            $json2 = json_encode($response['partyRoom']);
            echo $json2;

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
}

    else {

    echo  'no';
}

    


//if () {
//    echo 'las 3';
//} else {
//    

?>
        
