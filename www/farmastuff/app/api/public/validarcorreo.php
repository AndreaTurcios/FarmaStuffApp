<?php
//header('Access-Control-Allow-Origin: *');
require_once('../../helpers/emailtestPublic.php');    
    if (isset($_POST['datavalidarc'])) {                                
        $result['message'] = 'Correo enviado correctamente'; 
    }
?>