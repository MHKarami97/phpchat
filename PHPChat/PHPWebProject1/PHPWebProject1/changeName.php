<?php

include "init.php";

$obj= new baseClass;

if(!isset($_SESSION['userName'])){

    header("location:login.php");
}

if(isset($_POST['change_name'])){

    $new_name= $obj->Security($_POST['user_name']);
    $new_name_status= 1;

    if(empty($new_name)){

        $new_name_error= "لطفا نام جدید را وارد کنید";
        $new_name_status= 0;
    }

    if($new_name_status == 1){

        $userId= $_SESSION['userId'];
        if($obj->NormalQuery("UPDATE users SET name=? WHERE id=?",[$new_name,$userId])){

            $obj->CreateSession("nameChange","نام شما با موفقیت تغییر یافت");
            unset($_SESSION['userName']);
            header("location:login.php");
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no" />
    <?php include 'components/css.php'; ?>
</head>
<body>
    <?php include 'components/nav.php'; ?>
    <div class="chat_container">
        <?php include 'components/sidebar.php'; ?>
        <section id="right_area">
            <?php include 'components/changeName.php'; ?>
        </section><!--Close right_area-->
    </div><!--Close chat_container-->

    <?php include 'components/js.php'; ?>
</body>
</html>
