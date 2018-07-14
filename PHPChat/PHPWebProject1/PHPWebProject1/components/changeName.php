<div class="form_section">
    <div class="form_grid">
        <form method="post" action="">
            <div class="group">
                <h2 class="form-heading">تغییر اسم</h2>
            </div><!--Close group-->
            <div class="group">
                <input type="text" name="user_name" class="control" placeholder="نام جدید" />
                <div class="name_error error">
                    <?php
                    if(isset($new_name_error)){
                        echo $new_name_error;
                    }
                    ?>
                </div><!--Close error-->
            </div><!--Close group-->
            <div class="group">
                <input type="submit" name="change_name" class="btn acount-btn" value="تغییر نام" />
            </div><!--Close group-->
        </form>
    </div><!--Close form_grid-->
</div><!--Close form_section-->