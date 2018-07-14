<div class="form-area">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="group">
            <h2 class="form-heading">عضویت در چت روم</h2>
        </div><!--Close group-->
        <div class="group">
            <input value="<?php if(isset($full_name)): echo $full_name; endif; ?>" type="text" name="full_name" class="control" placeholder="نام شما" />
            <div class="name_error error">
                <?php
                if(isset($name_error)){
                    echo $name_error;
                }
                ?>
            </div><!--Close error-->
        </div><!--Close group-->
        <div class="group">
            <input value="<?php if(isset($email)): echo $email; endif; ?>" type="email" name="email" class="control" placeholder="ایمیل شما" />
            <div class="name_error error">
                <?php
                if(isset($email_error)){
                    echo $email_error;
                }
                ?>
            </div><!--Close error-->
        </div><!--Close group-->
        <div class="group">
            <input value="<?php if(isset($password)): echo $password; endif; ?>" type="password" name="password" class="control" placeholder="رمز عبور شما" />
            <div class="name_error error">
                <?php
                if(isset($password_error)){
                    echo $password_error;
                }
                ?>
            </div><!--Close error-->
        </div><!--Close group-->
        <div class="group">
            <label for="file" id="file_label">
                انتخاب عکس
                <i class="fas fa-cloud-upload-alt upload-icon"></i>
            </label>
            <input type="file" name="img" class="file" id="file" />
            <div class="name_error error">
                <?php
                if(isset($img_error)){
                    echo $img_error;
                }
                ?>
            </div><!--Close error-->
        </div><!--Close group-->
        <div class="group">
            <input type="submit" name="signup" class="btn acount-btn" value="عضویت" />
        </div><!--Close group-->
        <div class="group">
            <a href="login.php" class="link">من عضو سایت هستم</a>
        </div><!--Close group-->
    </form>
</div><!--Close form-area-->