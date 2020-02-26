<?php

require_once '../tableModel/user.php';

$sessionid = '';
$sessionid = $_POST['session'];

if ($sessionid != '' && $sessionid != null){
    $user_model = new User();
    $user = $user_model->getBy('session_id', $sessionid);

    if ($user != null){
        
    }
}


?>