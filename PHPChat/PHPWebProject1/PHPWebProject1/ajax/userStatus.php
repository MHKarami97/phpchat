<?php
include "../init.php";

$obj= new baseClass;

if($obj->NormalQuery("SELECT * FROM activities")){

    $rows= $obj->FetchAll();

    foreach($rows as $result):

        $user_id= $result['user_id'];
        $login_time= $result['login_time'];
        $currect_time= time();
        $s_user_id= $_SESSION['userId'];
        $time_diff= $currect_time - $login_time;
        $status= 0;

        if($user_id == $s_user_id){

            if($time_diff > 1800){

                $obj->NormalQuery("UPDATE users SET status=? WHERE id=?",[$status, $s_user_id]);

                unset($_SESSION['userId']);

                echo json_encode(array("status" => "href"));
            }
        }
        else{

            if($time_diff > 1800){

                $status_again= 1;
                $obj->NormalQuery("UPDATE users SET status=? WHERE id=? AND status=?",[$status, $s_user_id, $status_again]);
            }
        }
    endforeach;
}
?>