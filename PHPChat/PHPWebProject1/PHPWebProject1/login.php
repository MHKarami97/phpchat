<?php

include "init.php";
$obj= new baseClass;

if(isset($_POST['login'])){

    $email= $obj->Security($_POST['email']);
    $password= $obj->Security($_POST['password']);
    $email_status= $password_status= 1;

    if(empty($email)){

        $email_error= "لطفا ایمیل خود را وارد کنید";
        $email_status= 0;
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $email_error= "لطفا ایمیل خود را صحیح وارد کنید";
        $email_status= 0;
    }

    if(empty($password)){

        $password_error= "لطفا رمز عبور خود را وارد کنید";
        $password_status= 0;
    }

    if($email_status== 1 && $password_status== 1){

        $status= 0;

        if($obj->NormalQuery("SELECT * FROM users WHERE email=?", [$email])){

            if($obj->CountRows() == 0){

                $email_error= "ایمیل وارد شده اشتباه است";
                $email_status= 0;
            }
            else{

                $row= $obj->SingleResult();
                $db_email= $row->email;
                $db_password= $row->password;
                $db_name= $row->name;
                $db_img= $row->image;
                $clean_status= $row->clean_status;
                $user_id= $row->id;

                if(password_verify($password, $db_password)){

                    $newStatus= 1;
                    $obj->NormalQuery("UPDATE users SET status=? WHERE id=?",[$newStatus, $user_id]);

                    if($clean_status == 0){

                        if($obj->NormalQuery("SELECT * FROM messages ORDER BY id DESC LIMIT 1")){

                            $last_row= $obj->SingleResult();
                            $last_msg_id= $last_row->id + 1;

                            if($obj->NormalQuery("INSERT INTO clean (message_id, user_id) VALUES (?,?)",[$last_msg_id,$user_id])){

                                $update_clean_status= 1;
                                $obj->NormalQuery("UPDATE users SET clean_status=? WHERE id=?",[$update_clean_status,$user_id]);

                                $login_time= time();

                                if($obj->NormalQuery("SELECT * FROM activities WHERE user_id=?",[$user_id])){

                                    $activity_row= $obj->SingleResult();

                                    if($activity_row == 0){

                                        $obj->NormalQuery("INSERT INTO activities (user_id, login_time) VALUES (?, ?)",[$user_id, $login_time]);

                                        $obj->CreateSession("userName",$db_name);
                                        $obj->CreateSession("userId",$user_id);
                                        $obj->CreateSession("userImage",$db_img);
                                        header("location:index.php");
                                    }
                                    else{

                                        $obj->NormalQuery("UPDATE activities SET login_time=? WHERE user_id=?",[$login_time, $user_id]);

                                        $obj->CreateSession("userName",$db_name);
                                        $obj->CreateSession("userId",$user_id);
                                        $obj->CreateSession("userImage",$db_img);
                                        header("location:index.php");
                                    }
                                }
                            }
                        }
                    }
                    else{

                        $login_time= time();

                        if($obj->NormalQuery("SELECT * FROM activities WHERE user_id=?",[$user_id])){

                            $activity_row= $obj->SingleResult();

                            if($activity_row == 0){

                                $obj->NormalQuery("INSERT INTO activities (user_id, login_time) VALUES (?, ?)",[$user_id, $login_time]);

                                $obj->CreateSession("userName",$db_name);
                                $obj->CreateSession("userId",$user_id);
                                $obj->CreateSession("userImage",$db_img);
                                header("location:index.php");
                            }
                            else{

                                $obj->NormalQuery("UPDATE activities SET login_time=? WHERE user_id=?",[$login_time, $user_id]);

                                $obj->CreateSession("userName",$db_name);
                                $obj->CreateSession("userId",$user_id);
                                $obj->CreateSession("userImage",$db_img);
                                header("location:index.php");
                            }
                        }
                    }
                }
                else{

                    $password_error= "رمز عبوراشتباه است";
                    $password_status= 0;
                }
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

    <div class="signup-container">
        <div class="acount-left">
            <div class="acount-text">
                <h1>Let's Chat</h1>
                <p>چت روم آی ترفند محلی برای تبادل نظر و صحبت با دوستان</p>
            </div>
        </div><!--Close acount-left-->
        <div class="acount-right">
            <?php include 'components/login.php'; ?>
        </div><!--Close acount-right-->
    </div><!--Close signup-container-->

    <?php include 'components/jsMain.php'; ?>
</body>
</html>
