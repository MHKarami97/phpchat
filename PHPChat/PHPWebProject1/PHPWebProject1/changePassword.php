<?php

include "init.php";

$obj= new baseClass;

if(!isset($_SESSION['userName'])){

    header("location:login.php");
}

if(isset($_POST['change_password'])){

    $currect_password= $obj->Security($_POST['currect_password']);
    $new_password= $obj->Security($_POST['new_password']);
    $re_new_password= $obj->Security($_POST['re_new_password']);
    $currect_password_status= $new_password_status= $re_new_password_status= 1;

    if(empty($currect_password)){

        $currect_password_error= "لطفا رمز فعلی خود را وارد کنید";
        $currect_password_status= 0;
    }

    if(empty($new_password)){

        $new_password_error= "لطفا رمز جدید را خود را وارد کنید";
        $new_password_status= 0;
    }
    elseif(strlen($new_password) < 5){

        $new_password_error= "طول رمز عبور کوتاه است";
        $new_password_status= 0;
    }

    if(empty($re_new_password)){

        $re_new_password_error= "لطفا فیلد تایید رمز عبور را وارد کنید";
        $re_new_password_status= 0;
    }
    elseif($new_password != $re_new_password){

        $re_new_password_error= "تاییدیه رمز عبور صحیح نمی باشد";
        $re_new_password_status= 0;
    }

    if($new_password_status == 1 && $re_new_password_status == 1 && $currect_password_status == 1){

        $userId= $_SESSION['userId'];
        if($obj->NormalQuery("SELECT password FROM users WHERE id=?",[$userId])){

            $row= $obj->SingleResult();
            $db_password= $row->password;

            if(password_verify($currect_password, $db_password)){

                if($obj->NormalQuery("UPDATE users SET password=? WHERE id=?", [password_hash($new_password,PASSWORD_DEFAULT), $userId])){

                    $obj->CreateSession("passwordChange","رمز عبور با موفقیت تغییر یافت");
                    unset($_SESSION['userName']);
                    header("location:login.php");
                }
            }
            else{

                $currect_password_error= "لطفا رمز فعلی خود را درست وارد کنید";
                $currect_password_status= 0;
            }
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
            <?php include 'components/changePassword.php'; ?>
        </section><!--Close right_area-->
    </div><!--Close chat_container-->

    <?php include 'components/js.php'; ?>
</body>
</html>
