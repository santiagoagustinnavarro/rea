$(document).ready(function(){
    $("#categoria").after("<br/><input type=\"text\" class=\"form-control\" id=\"nuevaCategoria\" placeholder=\"ingrese el nombre de la nueva categoria\" name=\"nuevaCategoria\">")
    $("#tema").after("<br/><input type=\"text\" class=\"form-control\" id=\"nuevoT\" placeholder=\"ingrese el nombre del nuevo tema\" name=\"nuevoT\">")
    $("#categoria").change(function(){
        if($("#categoria").val()!=""){
            if($("#tema").val()==""){
                $("#tema").after("<br/><input type=\"text\" class=\"form-control\" id=\"nuevoT\" placeholder=\"ingrese el nombre del tema nuevo\" name=\"nuevoT\">")
            }else{
               $("#nuevoT").remove();
            }
            $("#nuevaCategoria").remove();
            $("#nuevoT").remove();
            $.ajax({
                url:"listarCategoria",
                data:{seleccionado:$("#categoria").val()},
                method:"POST",
                dataType: "html",
                success:function(response){
                    $("#tema").replaceWith($("#tema",response));
                }
            });
        }else{
            $("#categoria").after("<br/><input type=\"text\" class=\"form-control\" id=\"nuevaCategoria\" placeholder=\"ingrese el nombre de la nueva categoria\" name=\"nuevaCategoria\">")
           $("#tema").remove();
           $("#nuevaCategoria").after("<br> <select class=\"form-control text-center\" id=\"tema\" name=\"tema\"> <option value=\"\" selected>Agregar Tema</option></select>")
           $("#tema").after("<br/><input type=\"text\" class=\"form-control\" id=\"nuevoT\" placeholder=\"ingrese el nombre del tema nuevo\" name=\"nuevoT\">")
        }
    });
 
})