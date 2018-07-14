<?php

include "init.php";

if(!isset($_SESSION['userName'])){

    header("location:login.php");
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
    <div class="loader_area">
        <div class="loader">
            <div class="loader_item"></div>
        </div><!--Close loader-->
    </div><!--Close loader_area-->
    <?php include 'components/nav.php'; ?>
    <div class="chat_container">
        <?php include 'components/sidebar.php'; ?>
        <section id="right_area">
            <?php include 'components/messages.php'; ?>
            <?php include 'components/chatForm.php'; ?>
            <?php include 'components/emoji.php'; ?>
        </section><!--Close right_area-->
    </div><!--Close chat_container-->

    <?php include 'components/js.php'; ?>
    <script>
        $(document).ready(function () {
            $('.custom_bars').click(function () {
                $('#sidebar').slideToggle();
                $('#right_area').slideToggle();
            });
            $(".loader_area").show();
            setTimeout(function () {
                $(".loader_area").hide();
            },2200);
        })
    </script>    
</body>
</html>
