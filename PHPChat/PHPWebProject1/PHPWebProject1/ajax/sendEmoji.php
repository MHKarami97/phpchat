<?php
header('Content-type: application/json');

include "../init.php";

$obj= new baseClass;

if(isset($_POST['send_emoji'])){

    $emoji= $obj->Security($_POST['send_emoji']);
    $user_id= $_SESSION['userId'];
    $msg_type= "emoji";

    if($obj->NormalQuery("INSERT INTO messages (message, type, user_id) VALUES (?,?,?)", [$emoji, $msg_type, $user_id])){

        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }
}
?>