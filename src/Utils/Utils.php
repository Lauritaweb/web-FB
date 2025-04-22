<?php

namespace App\Utils;

define('MAIL_ADDRESS_CONTACT', 'info@foreverbikes.com.ar'); 
define('MAIL_NAME_CONTACT', 'Forever Bikes');
define('MAILJET_API_KEY', 'c90ee4c8e3dd0f14a4e6338a970fa1db:8c8d0fac35d91213d2201d32daaa40f3');

define('JWT_IO_KEY', 'y8QJpX9hlykbSRJi00ttHeEfsXbMD9nWM6xXpRsi');

class Utils
{


    public static function mailSenderPurchase($cliente, $cart){
        include('templateMailPurchase.php');
        Utils::mandarMail("foreverbikesarg@gmail.com", "Compra desde el Sitio Web", $htmlEmail, "Forever Bikes");
    }

    public static function mailSenderPurchaseLau($cliente, $cart){
        include('templateMailPurchase.php');
        Utils::mandarMail("laheavy@gmail.com", "Compra desde el Sitio Web", $htmlEmail, "Forever Bikes");
    }

    function manageFileUpload(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) { // Verificar si el archivo fue subido sin errores
            $uploadDir = __DIR__ . '/files/'; 
        
            $originalFileName = basename($_FILES['file']['name']);
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        
            $date = new DateTime();
            $timestamp = $date->format('Ymd_His');
            // ToDo: agregar id_affiliate
            $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $timestamp . '.' . $fileExtension;
            $uploadFile = $uploadDir . $newFileName;       
            
            
            if (!is_dir($uploadDir)) 
                mkdir($uploadDir, 0777, true);
                
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile))            
                $inputFileName = $uploadFile;        
            else{
                echo "Hubo un error al subir el archivo.";
                //header("Location: bank-reconciliation.php?success=false");
            }
        }else         
            return null; // "No se subió ningún archivo o hubo un error en la subida.";
            
        return $newFileName;
    }   
  
    public static function mostrarTarifaSinCentavos($tarifa) {
        return number_format(floor($tarifa), 0, '', '.');
    }
    
    

    public static function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags(trim($input)));
    }

    public static function formatDate($date){
        $dateObject = new \DateTime($date);
        return $dateObject->format('Y-m-d');
    }

    public static function formatDateUser($date){
        if ($date != null){
            $dateObject = new \DateTime($date);
            return $dateObject->format('d/m/Y');
        }
        
    }

    public static function isAdminLogged(){
        return (isset($_SESSION['id_admin']) && $_SESSION['id_admin'] > 0 );
    }

    public static function isAssessorLogged(){
        return (isset($_SESSION['id_assessor']) && $_SESSION['id_assessor'] > 0 );
    }

    public static function isAffiliateLogged(){
        return (isset($_SESSION['id_affiliate']) && $_SESSION['id_affiliate'] > 0 );
    }

    public static function validateLoggedAssessor(){
        if(!Utils::isAssessorLogged())
            header('../salir.php');
    }
    
    public static function validateLoggedAdmin(){
        if(!Utils::isAdminLogged())
            header('Location: ../salir.php');            
    }
    
    public static function validateLoggedAffiliate(){
        if(!Utils::isAffiliateLogged())
            header('../salir.php');
    }

    public static function mailSenderCreatedAccount($email, $name){
        include('templateCreateAccount.php');
        Utils::mandarMail($email, "Bienvenido a Lexor Abogados", $html, $name);
    }

    public static function mailSenderActivatedAccount($email, $name){
        include('templateActivateAccount.php');
        Utils::mandarMail($email, "Lexor Abogados - Su cuenta ha sido activada", $html, $name);
    }

    public static function mailSenderDeactivatedAccount($email, $name){
        include('templateDeactivateAccount.php');
        Utils::mandarMail($email, "Lexor Abogados - Su cuenta ha sido desactivada", $html, $name);
    }

    public static function mailSenderCreatedAppointment($email, $name, $lawyer_name, $date, $time){
        include('templateNewAppointment.php');
        Utils::mandarMail($email, "Nuevo turno asignado en Lexor Abogados", $html, $name);
    }

    public static function mailForgotPassword($email){
        include('Token.php');
        $token = createJwtToken($email,JWT_IO_KEY);
        $tokenUrl = "token=$token";
        include('templateForgotPassword.php');

        Utils::mandarMail($email, "Recuperar contraseña", $html, $email);
    }
    
    public static function mandarMail($email, $subject, $message, $name = ""){                
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => MAIL_ADDRESS_CONTACT,
                        'Name' => MAIL_NAME_CONTACT
                    ],
                    'To' => [
                        [
                            'Email' => $email,
                            'Name' => $name
                        ]
                    ],
                    'Subject' => $subject,
                    'HTMLPart' => $message
                ]
            ]
        ];
        
        $ch = curl_init();        
        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')
        );
        curl_setopt($ch, CURLOPT_USERPWD, MAILJET_API_KEY);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        
        $response = json_decode($server_output);    
        $status= $response->Messages[0]->Status == 'success';
        return $status;
    }

    public static function fechaUsuario($fecha){
        $arr = explode("-", $fecha);
        if (count($arr) != 3) {
            return $fecha;
        } else {
            return "$arr[2]/$arr[1]/$arr[0]";
        }
    }


}
