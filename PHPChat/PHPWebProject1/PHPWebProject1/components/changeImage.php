<div class="form_section">
    <div class="form_grid">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="group">
                <h2 class="form-heading">تغییر عکس</h2>
            </div><!--Close group-->
            <div class="group">
                <label for="file" id="file_label">
                    انتخاب عکس
                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                </label>
                <input type="file" name="img" class="file" id="file" />
                <div class="name_error error">
                    <?php
                    if(isset($new_image_error)){
                        echo $new_image_error;
                    }
                    ?>
                </div><!--Close error-->
            </div><!--Close group-->
            <div class="group">
                <input type="submit" name="change_img" class="btn acount-btn" value="تغییر عکس" />
            </div><!--Close group-->
        </form>
    </div><!--Close form_grid-->
</div><!--Close form_section-->