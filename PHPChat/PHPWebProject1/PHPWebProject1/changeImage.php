<?php

include "init.php";

$obj= new baseClass;

if(!isset($_SESSION['userName'])){

    header("location:login.php");
}

if(isset($_POST['change_img'])){

    $img_name= $_FILES['img']['name'];
    $img_tmp= $_FILES['img']['tmp_name'];
    $img_patch= "assets/img/profile";
    $extension= ['png','jpeg','jpg'];
    $img_ext= explode(".",$img_name);
    $img_extension= end($img_ext);
    $rand_img= $img_ext[0].rand(0,999999).".".$img_extension;
    $new_image_status= 1;

    if(empty($img_name)){

        $new_image_error= "لطفا عکس جدید را وارد کنید";
        $new_image_status= 0;
    }
    elseif(!in_array($img_extension, $extension)){

        $new_image_error= "فرمت عکس اشتباه است";
        $new_image_status= 0;
    }

    if($new_image_status == 1){

        move_uploaded_file($img_tmp, $img_patch."/".$rand_img);

        $userId= $_SESSION['userId'];
        if($obj->NormalQuery("UPDATE users SET image=? WHERE id=?",[$rand_img,$userId])){

            $obj->CreateSession("imageChange","عکس شما با موفقیت تغییر یافت");
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
            <?php include 'components/changeImage.php'; ?>
        </section><!--Close right_area-->
    </div><!--Close chat_container-->

    <?php include 'components/js.php'; ?>
</body>
</html>
