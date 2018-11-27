$(document).ready(function(){
    var checkbox;
    var busqueda="";
    $("#tema").change(function(){
        checkbox=[];
        if($("input[type=checkbox]:checked").length>0){
          
            $("input[type=checkbox]:checked").each(function(){
                checkbox.push($(this).val());
            });
        }
            $.ajax({
                url: "listar",
                type: 'POST',
                data: {'tema': $("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda},
                dataType: "html",
                success: function(response) {
                    $(".col-md-9").replaceWith($(".col-md-9",response));
                }
            });
        
    })
    $("input[type=checkbox]").change(function(){
        checkbox=[];
        if(($("input[type=checkbox]:checked").length)>0){
        $("input[type=checkbox]:checked").each(function(){  
            checkbox.push($(this).val());
          })
        }
            $.ajax({
                url: "listar",
                type: 'POST',
                data: {'tema':$("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda},
                dataType: "html",
                success: function(response) {
                    $(".col-md-9").replaceWith($(".col-md-9", response));
                }
            }); 
    }); 
    $("button").click(function(){
        if($("input[type=text]").val()!=""){
            busqueda=$("input[type=text]").val()
        }else{
            busqueda="";
        }
        checkbox=[];
        if(($("input[type=checkbox]:checked").length)>0){
        $("input[type=checkbox]:checked").each(function(){  
            checkbox.push($(this).val());
          })
        }
            $.ajax({
                url: "listar",
                type: 'POST',
                data: {'tema':$("#tema").val(),'niveles':JSON.stringify(checkbox),'busqueda':busqueda},
                dataType: "html",
                success: function(response) {
                    $(".col-md-9").replaceWith($(".col-md-9", response));
                }
            }); 
    });
  
    
});



