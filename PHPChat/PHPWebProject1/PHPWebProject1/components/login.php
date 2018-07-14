<div class="form-area">    
    <?php include "loginSession.php"; ?>

    <form method="post" action="">
        <div class="group">
            <h2 class="form-heading">ورود به چت روم</h2>
        </div><!--Close group-->
        <div class="group">
            <input type="email" name="email" class="control" placeholder="ایمیل شما" />
            <div class="name_error error">
                <?php
                if(isset($email_error)){
                    echo $email_error;
                }
                ?>
            </div><!--Close error-->
        </div><!--Close group-->
        <div class="group">
            <input type="password" name="password" class="control" placeholder="رمز عبور شما" />
            <div class="name_error error">
                <?php
                if(isset($password_error)){
                    echo $password_error;
                }
                ?>
            </div><!--Close error-->
        </div><!--Close group-->
        <div class="group">
            <input type="submit" name="login" class="btn acount-btn" value="ورود" />
        </div><!--Close group-->
        <div class="group">
            <a href="signup.php" class="link">عضو سایت نیستم</a>
        </div><!--Close group-->
    </form>
</div><!--Close form-area-->