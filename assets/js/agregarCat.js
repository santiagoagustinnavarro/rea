$(document).ready(function(){
    $("#categoria").change(function(){
        alert("mama")
        $.ajax({
            url:"listarCategoria",
            data:{"seleccionado":$("#categoria").val()},
            method:"POST",
            dataType: "html",
            success:function(response){
                $("#tema").replaceWith($("#tema",response));
            }

        });
    });
})