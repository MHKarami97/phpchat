<?php
include "../init.php";

$obj= new baseClass;
$status= 1;

if($obj->NormalQuery("SELECT * FROM activities WHERE status=?",[$status])){

    $count_online= $obj->CountRows();
    echo json_encode(array("users" => $count_online));
}
?>