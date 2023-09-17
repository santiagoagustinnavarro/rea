$(document).ready(function(){
    var niveles;
    $("#categoria").change(function(){
        niveles=[];
        $("input[type=checkbox]:checked").each(function(){
            niveles.push($(this).val());
        })
        $.ajax({
            url:window.location.pathname,
            data:{"categoria":$("#categoria").val()},
            dataType:"html",
            method:'get',
            success:function(response){
                $("#tema").replaceWith($("#tema",response))

            }
        })
    
    });
   
});
function remove(unElemento){
   $(unElemento).parent().hide();
   $('body').append("<input type=\"hidden\" name=archivo[] id=archivo[] value="+$(unElemento).attr('id')+"/>").hide();

}
function subirrecurso(form){
   var valido=false;
 form.find(':input').each(function(){
     
    if(this.type=="checkbox" && this.checked==true){ 
        valido=true; 
       
        }      
    }) 
    if(!valido){ 
        alert("Chequee una casilla!");return false 
        }
 
}
