$(document).ready(function () {

    $(".chat_form").keypress(function (e) {

        if (e.keyCode === 13) {

            var sendMessage = $("#sendMessage").val();

            if (sendMessage.length !== "") {

                $.ajax({
                    type: 'POST',
                    url: 'ajax/SendMessage.php',
                    data: { send_message: sendMessage },
                    datatype: 'json',
                    success: function (feedback) {

                        if (feedback['status'] === 'success') {

                            $(".chat_form").trigger("reset");
                            show_message();
                            $(".messages").animate({ scrollTop: $(".messages")[0].scrollHeight }, 1000);
                        }
                    }
                });
            }
        }
    });

    $("#upload_files").change(function () {

        var fileName = $("#upload_files").val();

        if (fileName.length !== "") {

            $.ajax({
                type: 'POST',
                url: 'ajax/SendFile.php',
                data: new FormData($(".chat_form")[0]),
                contentType: false,
                processData: false,
                success: function (feedback) {

                    if (feedback === "success") {

                        $(".chat_form").trigger("reset");
                        show_message();
                        $(".messages").animate({ scrollTop: $(".messages")[0].scrollHeight }, 1000);
                    }
                    if (feedback === "error") {

                        $(".file_error").addClass("show_file_error");
                        $(".file_error").html("<span class='files-cross-icon'>&#x2715;</span>Invalid file");

                        setTimeout(function () {

                            $(".file_error").removeClass("show_file_error");
                        },
                            2000);
                    }
                }
            });
        }
    });

    $(".emoji_same").click(function () {

        var emoji = $(this).attr("src");

        $.ajax({
            type: 'POST',
            url: 'ajax/SendEmoji.php',
            data: { send_emoji: emoji },
            datatype: 'json',
            success: function (feedback) {

                if (feedback['status'] === "success") {
                    show_message();
                    $(".messages").animate({ scrollTop: $(".messages")[0].scrollHeight }, 1000);
                }
            }
        });
    });

    $(".clean").click(function () {

        var clean = 1;
        $.ajax({
            type: 'POST',
            url: 'ajax/clean.php',
            data: { 'clean': clean },
            datatype: 'json',
            success: function (feedback) {

                if (feedback['status'] === "success") {
                    show_message();
                }
            }
        });
    });

    setInterval(function () {

        show_message();
        user_status();
        online_user();
    }, 3000);
});

function online_user() {

    $.ajax({
        type: 'GET',
        url: 'ajax/onlineUser.php',
        datatype: 'json',
        success: function (feedback) {

            if (feedback['status'] === 'users') {

                $(".online_user").html(feedback['status']);
            }
        }
    });
}

function user_status() {

    $.ajax({
        type: 'GET',
        url: 'ajax/userStatus.php',
        datatype: 'json',
        success: function (feedback) {

            if (feedback['status'] === 'href') {

                window.location = "login.php";
            }
        }
    });
}

function show_message() {

    var msg = true;

    $.ajax({
        type: 'GET',
        url: 'ajax/showMessage.php',
        data: { 'message': msg },
        success: function (feedback) {

            $(".messages").html(feedback);
        }
    });
}

show_message();

$(".messages").animate({ scrollTop: $(".messages")[0].scrollHeight + 10000 }, 1000);