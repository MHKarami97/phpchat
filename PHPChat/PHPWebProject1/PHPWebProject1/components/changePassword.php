<div class="form_section">
    <div class="form_grid">
        <form method="post" action="">
            <div class="group">
                <h2 class="form-heading">تغییر رمز عبور</h2>
            </div><!--Close group-->
            <div class="group">
                <input type="password" name="currect_password" class="control" placeholder="رمز فعلی" />
                <div class="name_error error">
                    <?php
                    if(isset($currect_password_error)){
                        echo $currect_password_error;
                    }
                    ?>
                </div><!--Close error-->
            </div><!--Close group-->
            <div class="group">
                <input type="password" name="new_password" class="control" placeholder="رمز عبور جدید" />
                <div class="name_error error">
                    <?php
                    if(isset($new_password_error)){
                        echo $new_password_error;
                    }
                    ?>
                </div><!--Close error-->
            </div><!--Close group-->
            <div class="group">
                <input type="password" name="re_new_password" class="control" placeholder="تکرار رمز عبور جدید" />
                <div class="name_error error">
                    <?php
                    if(isset($re_new_password_error)){
                        echo $re_new_password_error;
                    }
                    ?>
                </div><!--Close error-->
            </div><!--Close group-->
            <div class="group">
                <input type="submit" name="change_password" class="btn acount-btn" value="تغییر رمز" />
            </div><!--Close group-->
        </form>
    </div><!--Close form_grid-->
</div><!--Close form_section-->