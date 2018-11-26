$(document).ready(function() {
    $("#tema").change(function () {
        if ($("#tema").val() != "ninguno") {
            $.ajax({
                url: "listar",
                type: 'POST',
                data: { 'tema': $("#tema").val() },
                dataType: "html",
                success: function (response) {
                    $(".col-md-9").replaceWith($(".col-md-9", response));
                }
            });
        } else {
            $.ajax({
                url: "listar",
                type: 'POST',
                data: { 'tema': "" },
                dataType: "html",
                success: function (response) {
                    $(".col-md-9").replaceWith($(".col-md-9", response));
                }
            });
        }
    })




})