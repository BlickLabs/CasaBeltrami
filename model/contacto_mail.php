<?php
error_reporting(E_ALL);

use Mailgun\Mailgun;

require '../vendor/autoload.php';
$name=$_POST['name'];
$email = $_POST['email'];
$phone= $_POST['phone_number'];
$type_event=$_POST['type_event'];
$date=$_POST['date_event'];
$services=$_POST['service'];
$persons=$_POST['persons'];
$asunto = 'Una persona necesita una cotización ';

/* Desarrollo */
$api_key = 'key-eb656047b090ea091ef7c5d2fbd83dc5';
$api_domain = 'sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org';
$send_to = 'desarrolloblick@gmail.com';

////# Include the Autoloader (see "Libraries" for install instructions)
//    require '../vendor/autoload.php';
//    use Mailgun\Mailgun;

//# Instantiate the client.
    $mgClient = new Mailgun('key-eb656047b090ea091ef7c5d2fbd83dc5');
    $domain = "sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org";

//
//# Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' => $email,
        'to' => $send_to,
        'subject' => $asunto,
        'text' => 
        
        'Hola equipo de Casa Beltrami.

        ' . $name . ' a solicitado una cotización
            
        Los datos del Cliente son los siguientes
        
        Nombre del cliente: ' . $name . '
        Correo electrónico: ' . $email. '
        Telefono: ' . $phone. '
        Tipo de evento: ' . $type_event. '
        Fecha del evento: ' . $date. '
        Servicio que solicita: ' . $services. '
        Número de personas: ' . $persons. '
        
        '
    ));
$message = '<div class="alert alert-success" role="alert">¡Tu mensaje ha sido enviado, pronto nos pondremos en contacto contigo!</div>';
echo $message;    
  
    

?>