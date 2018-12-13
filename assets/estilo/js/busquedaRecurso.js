
function actualizarTema(){
    var checkbox;
    var categoria;
    var busqueda;
    checkbox=[];
    if($("input[type=checkbox]:checked").length>0){
        $("input[type=checkbox]:checked").each(function(){
            checkbox.push($(this).val());
        });
    }
    busqueda=$("input[type=text]").val();
    categoria=$("#categoria").val();
        $.ajax({
            url: "listar",
            type: 'POST',
            data: {'tema': $("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda,'categoria':categoria},
            dataType: "html",
            success: function(response) {
                $(".col-md-9").html($(".col-md-9",response).children());
                $(".estrellas").starrr();
            }
        });  
}
$(document).ready(function(){
    

    
    $("input[type=checkbox]").change(function(){
        checkbox=[];
        if(($("input[type=checkbox]:checked").length)>0){
        $("input[type=checkbox]:checked").each(function(){  
            checkbox.push($(this).val());
          })
        }
        busqueda=$("input[type=text]").val();
        categoria=$("#categoria").val();
            $.ajax({
                url: "listar",
                type: 'POST',
                data: {'tema':$("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda,'categoria':categoria},
                dataType: "html",
                success: function(response) {
                    $(".col-md-9").html($(".col-md-9", response).children());
                    $(".estrellas").starrr();
                }
            }); 
    }); 
    $("input[type=text]").keyup(function(){//Click en la opcion de busqueda
        checkbox=[];
        if(($("input[type=checkbox]:checked").length)>0){
        $("input[type=checkbox]:checked").each(function(){  
            checkbox.push($(this).val());
          })
        }
        busqueda=$("input[type=text]").val();
        categoria=$("#categoria").val();
            $.ajax({
                url: "listar",
                type: 'POST',
                data: {'tema':$("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda,'categoria':categoria},
                dataType: "html",
                success: function(response) {
                    $(".col-md-9").html($(".col-md-9", response).children());
                    $(".estrellas").starrr();
                }
            }); 
    });
    $("#categoria").change(function(){
        checkbox=[];
        if(($("input[type=checkbox]:checked").length)>0){
        $("input[type=checkbox]:checked").each(function(){  
            checkbox.push($(this).val());
          })
        }
        busqueda=$("input[type=text]").val();
        categoria=$("#categoria").val();
        $.ajax({
            url: "listar",
            type: 'POST',
            data: {'tema':$("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda,'categoria':categoria},
            dataType: "html",
            success: function(response) {
                $(".col-md-9").html($(".col-md-9", response).children());
                $("#tema").html($("#tema", response).children());
                $(".estrellas").starrr();
               
              
            }
        }); 
    });
    $(".estrellas").starrr();
    $(".estrellas").click(function(){
    alert("me clickeaste che")
    })
  

  
    
});




