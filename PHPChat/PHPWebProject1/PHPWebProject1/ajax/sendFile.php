<?php
include "../init.php";

$obj= new baseClass;

if(isset($_FILES['sendFile']['name'])){
    $file_name= $_FILES['sendFile']['name'];
    $tmp_name= $_FILES['sendFile']['tmp_name'];
    $store_file= "../assets/img/file";
    $extension= array("jpg","jpeg","png","pdf","zip","rar","docx","JPG","JPEG","PNG","PDF","ZIP","RAR","DOCX");
    $file_ext= explode(".",$file_name);
    $file_extension= end($file_ext);
    $rand_file= $file_ext[0].rand(0,999999).".".$file_extension;
    $user_id= $_SESSION['userId'];
    $msg_type= "text";

    if(!in_array($file_extension,$extension)){

        echo "error";
    }
    else{

        move_uploaded_file($tmp_name, $store_file."/".$rand_file);

        $user_id= $_SESSION['userId'];
        $msg_type= $file_extension;

        if($obj->NormalQuery("INSERT INTO messages (message, type, user_id) VALUES (?,?,?)", [$rand_file, $msg_type, $user_id])){

            echo "success";
        }
    }
}