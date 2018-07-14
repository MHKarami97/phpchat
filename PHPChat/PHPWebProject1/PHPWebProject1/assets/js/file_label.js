$(document).ready(function () {
    $(document).on("change",
        "#file",
        function (parameters) {
            var imageName = $("#file").val();
            $("#file_label").html(imageName);
        });
});