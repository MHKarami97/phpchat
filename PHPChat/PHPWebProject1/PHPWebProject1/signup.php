<?php

include "init.php";
$obj= new baseClass;

if(isset($_POST['signup'])){

    $full_name= $obj->Security($_POST['full_name']);
    $email= $obj->Security($_POST['email']);
    $password= $obj->Security($_POST['password']);
    $img_name= $_FILES['img']['name'];
    $img_tmp= $_FILES['img']['tmp_name'];
    $img_patch= "assets/img/profile";
    $extension= ['png','jpeg','jpg'];
    $img_ext= explode(".",$img_name);
    $img_extension= end($img_ext);
    $rand_img= $img_ext[0].rand(0,999999).".".$img_extension;
    $name_status= $email_status= $password_status= $img_status= 1;

    if(empty($full_name)){

        $name_error= "لطفا نام خود را وارد کنید";
        $name_status= 0;
    }

    if(empty($email)){

        $email_error= "لطفا ایمیل خود را وارد کنید";
        $email_status= 0;
    }
    else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $email_error= "لطفا ایمیل خود را صحیح وارد کنید";
            $email_status= 0;
        }
        else{
            if($obj->NormalQuery("SELECT email FROM users WHERE email=?",array($email))){
                if($obj->CountRows() > 0){

                    $email_error= "این ایمیل وجود دارد";
                    $email_status= 0;
                }
            }
        }
    }

    if(empty($password)){

        $password_error= "لطفا رمز عبور خود را وارد کنید";
        $password_status= 0;
    }
    elseif(strlen($password) < 5){

        $password_error= "طول رمز عبور کوتاه است";
        $password_status= 0;
    }

    if(empty($img_name)){

        $img_error= "لطفا عکس خود را انتخاب کنید";
        $img_status= 0;
    }
    elseif(!in_array($img_extension, $extension)){

        $img_error= "فرمت عکس اشتباه است";
        $img_status= 0;
    }

    //*****

    if($name_status== 1 && $email_status== 1 && $password_status== 1 && $img_status== 1){

        move_uploaded_file($img_tmp, $img_patch."/".$rand_img);

        $status= 0;
        $clean_status= 0;

        if($obj->NormalQuery("INSERT INTO users (name, email, password, image, status, clean_status) VALUES (?,?,?,?,?,?)",
                        [$full_name, $email, password_hash($password, PASSWORD_DEFAULT), $rand_img, $status, $clean_status])){

            $obj->CreateSession("successfull","اکانت شما ساخته شد");
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

    <div class="signup-container">
        <div class="acount-left">
            <div class="acount-text">
                <h1>Let's Chat</h1>
                <p>چت روم آی ترفند محلی برای تبادل نظر و صحبت با دوستان</p>
            </div>
        </div><!--Close acount-left-->
        <div class="acount-right">
            <?php include 'components/signup.php'; ?>
        </div><!--Close acount-right-->
    </div><!--Close signup-container-->

    <?php include 'components/jsMain.php'; ?>
    <script type="text/javascript" src="assets/js/file_label"></script>
</body>
</html>
