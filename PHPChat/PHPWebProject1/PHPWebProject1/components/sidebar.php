
<section id="sidebar">
    <ul class="left_ul">
        <li>
            <a href="#">
                <span class="profile_img_span">
                    <img src="assets/img/profile/<?php echo $_SESSION['userImage'] ?>" alt="profile image" class="profile_img" />
                </span>
            </a>
        </li>
        <li>
            <a href="index.php">
                <?php echo $_SESSION['userName'] ?>
                <span class="cool_hover"></span>
            </a>
        </li>        
        <li>
            <a href="changePassword.php">
                تغییر رمز عبور
                <span class="cool_hover"></span>
            </a>
        </li>
        <li>
            <a href="changeImage.php">
                تغییر عکس
                <span class="cool_hover"></span>
            </a>
        </li>
        <li>
            <a href="changeName.php">
                تغییر نام
                <span class="cool_hover"></span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="clean">
                پاک کردن تاریخچه
                <span class="cool_hover"></span>
            </a>
        </li>
        <li>
            <a href="#">
                کاربران آنلاین 
                <span class="online_user"></span>
                <span class="cool_hover"></span>
            </a>
        </li>
        <li>
            <a href="logout.php" style="color:red;">
                خروج
                <span class="cool_hover"></span>
            </a>
        </li>
    </ul>
</section><!--Close sidebar-->