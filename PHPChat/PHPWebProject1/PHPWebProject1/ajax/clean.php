<?php
header('Content-type: application/json');

include "../init.php";

$obj= new baseClass;

if(isset($_POST['clean'])){

    $user_id= $_SESSION['userId'];

    if($obj->NormalQuery("SELECT id FROM messages ORDER BY id DESC LIMIT 1")){

        $last_row= $obj->SingleResult();
        $last_msg_id= $last_row->id + 1;

        if($obj->NormalQuery("UPDATE clean SET message_id=? WHERE user_id=?",[$last_msg_id,$user_id])){

            $response_array['status'] = 'success';
            echo json_encode($response_array);
        }
    }
}
?>