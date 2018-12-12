$(document).ready(function(){
    $("#categoria").change(function(){
        if($("#categoria").val()!=""){
            $("#nuevaCategoria").hide();
            $("#descNuevaCategoria").hide();
            $.ajax({
                url:"listarCategoria",
                data:{seleccionado:$("#categoria").val()},
                method:"GET",
                dataType: "html",
                success:function(response){
                    $("#tema").html(($("#tema",response).children()))
                }
            });
        }else{
            $("#nuevaCategoria").show();
            $("#descNuevaCategoria").show();
        }
    });

})