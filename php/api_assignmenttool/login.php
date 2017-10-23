<?php
require_once 'functions.php';

$db = new DB_Functions();

$response = array('error' => FALSE);

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->login($username, $password);

    if($user != FALSE){
        $response["error"] = FALSE;
        $response["id"] = $user["id"];
        $response["user"]["name"] = $user["username"];
        echo json_encode($response);
    }else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Inlog gegevens zijn incorrect";
        echo json_encode($response);
    }
}else{
    $response['error'] = TRUE;
    $response['errormesage'] = 'Inlog gebruikersnaam / wachtwoord zijn missend!';
    echo json_encode($response);
}