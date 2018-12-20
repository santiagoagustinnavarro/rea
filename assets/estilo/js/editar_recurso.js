$(document).ready(function(){
     
    $( "#restaurar" ).css({"display":"none"})
    $( ".card-footer.text-center" ).draggable({revert:true});
    $(".card-footer.text-center").mousedown(function(){
        $( "#droppable" ).show();
    });
    $(".card-footer.text-center").mouseup(function(){
       if($("input[type=hidden]").length<=0){
        $( "#droppable" ).hide();
        $( "#restaurar" ).hide();
        }
    });
    var niveles;
    $.ajax({
        url:window.location.href,
        data:{"categoria":$("#categoria").val()},
        dataType:"html",
        method:'get',
        success:function(response){
            $("#tema").replaceWith($("#tema",response))

        }
    })

    $("#categoria").change(function(){
        niveles=[];
        $("input[type=checkbox]:checked").each(function(){
            niveles.push($(this).val());
        })
        $.ajax({
            url:window.location.href,
            data:{"categoria":$("#categoria").val()},
            dataType:"html",
            method:'get',
            success:function(response){
                $("#tema").replaceWith($("#tema",response))

            }
        })
    
    });
   /* $( "#droppable a" ).mouseover(function(){
        $( "#droppable a" ).css({"cursor":"pointer"})
    })*/
    $( "#restaurar" ).click(function(){
        $("input[type=hidden]").remove();
        $(".card-footer.text-center").show();
        $( "#droppable" ).hide();
        $( "#restaurar" ).hide();

    })
    $( "#droppable i" ).mouseover(function(){
        $( "#droppable i" ).css({"color":"red"});
    })
    $( "#droppable i" ).mouseout(function(){
        $( "#droppable i" ).css({"color":""});
    })
    $( "#droppable" ).droppable({
        drop: function( event, ui ) {
            $('#formActualizacion').append("<input type=\"hidden\" name=\"removerArchivo[]\"  value=\""+(ui.draggable).attr('name')+"\"/>");
            ui.draggable.hide();
          $(this).children('a').show()
          $( this )
            .addClass( "ui-state-highlight" )
            .find( "p" )
              .html( "Dropped!" );
        }
      });
   
      $("input[type=checkbox]").click(function(){
        if(!($(this).is(':checked'))){
            $('#formActualizacion').append("<input type=\"hidden\" name=\"removerNivel[]\" value=\""+$(this).val()+"\"/>");
        }
    })
});

    






function subirrecurso(form){
   var valido=false;
 form.find(':input').each(function(){
     
    if(this.type=="checkbox" && this.checked==true){ 
        valido=true; 
       
        }      
    }) 
    
    if(valido){ 
        
       valido=false;
        $(".card-footer.text-center").each(function(){
            if(($(this)).css("display")!="none"){
            valido=true;
             }
            
         });
         if(($("input[type=file]").get(0).files.length)>0){
             valido=true;
         }
         if(valido){

         }else{
             alert("El recurso no puede quedar sin archivos")
         }
      
    }else{
        alert("Marque al menos una casilla del año")
    }

  
    
        return valido;
 
}


