<?php
header('Content-type: application/json');

include "../init.php";

$obj= new baseClass;

if(isset($_POST['send_message'])){

    $message= $obj->Security($_POST['send_message']);
    $user_id= $_SESSION['userId'];
    $msg_type= "text";

    if($obj->NormalQuery("INSERT INTO messages (message, type, user_id) VALUES (?,?,?)", [$message, $msg_type, $user_id])){

        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }
}
?>