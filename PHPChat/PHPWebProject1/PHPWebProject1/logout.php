<?php

include "init.php";

$obj= new baseClass;
$newStatus= 0;
$user_id= $_SESSION['userId'];

if($obj->NormalQuery("UPDATE users SET status=? WHERE id=?",[$newStatus, $user_id])){

    session_destroy();
    header("location:login.php");
}
else{

    echo "error";
}

?>