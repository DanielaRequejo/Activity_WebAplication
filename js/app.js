window.onload = function(){
    $("#area").load("semana.php");
}; 

$(document).ready(function() {
    $('ul.main li').click(function(e){ 
        //alert("Este es:"+$(this).find("span.nav-text").text());
        if($(this).find("span.nav-text").text()==="Inicio"){
            $("#area").load("semana.php");
        }else if($(this).find("span.nav-text").text()==="Actividades"){ 
            $("#area").load("actividades.php");
        }else if($(this).find("span.nav-text").text()==="Semanales"){
            $("#area").load("semanales.php");
        }else if($(this).find("span.nav-text").text()==="Horarios Bloqueo"){
            $("#area").load("horarios.php");
        }else if($(this).find("span.nav-text").text()=="Reembolso de Comida"){
            $("#area").load("rembolso.php");
        }else if($(this).find("span.nav-text").text()==="Reposición de Horas"){
            $("#area").load("reposicion.php");
        }else if($(this).find("span.nav-text").text()==="Colegios"){
            $("#area").load("colegios.php");
        }else if($(this).find("span.nav-text").text()==="Empleados"){
            $("#area").load("empleados.php");
        }else{
        }
    });
    $("td.editar_u").live("click",function(e){
        $.post("editar_u.php", {id: $(this).attr("id")}, function(htmlexterno){
            $("#area").html(htmlexterno);
        });
    });
    $("td.borrar_u").live("click",function(e){
        $.post("borrar_u.php", {id: $(this).attr("id")}, function(htmlexterno){
            $("#area").html(htmlexterno);
        });
    });
    $("td.editar_c").live("click",function(e){
        $.post("editar_c.php", {id: $(this).attr("id")}, function(htmlexterno){
            $("#area").html(htmlexterno);
        }); 
    });
    $("td.borrar_c").live("click",function(e){
        $.post("borrar_c.php", {id: $(this).attr("id")}, function(htmlexterno){
            $("#area").html(htmlexterno);
        });
    });
    $("td.borrar_horas").live("click",function(e){
        var f= new Date();
        if(f.getDate()<10){
            var dia= "0"+f.getDate();
        }else{
            var dia=f.getDate();
        }
        var d= dia+"/"+(f.getMonth()+1)+"/"+f.getFullYear();
        $("#fechas").html(d);
        $.post("borrar_h.php", {id: $(this).attr("id"), fecha:d}, function(htmlexterno){
            $("#area").html(htmlexterno);
        });
    });
     $("td.bajar").live("click",function(e){
         var datos=$(this).attr("id");
        window.location.href = 'http://localhost/Proyectofinal/exportar.php?id='+datos; 
    });
    $(".selLabel").live("click",function (e) {
        $('.dropdown').toggleClass('active');
    });
    $(".dropdown-list li").live("click",function(e) {
        $('.selLabel').text($(this).text());
        $('.dropdown').removeClass('active');
        $('.selected-item p span').text($('.selLabel').text());
    });
    $("input.btn").live("click",function(e){
        //alert($(this).attr("id")+$('#Modificacion').val()+$('.selLabel').text());
        $.post("edicion_u.php", {id: $(this).attr("id"), modificacion: $('#Modificacion').val(), info: $('.selLabel').text()}, function(htmlexterno){
          $("#area").html(htmlexterno);  
        });
    });
     $("input.btn1").live("click",function(e){
        $.post("edicion_c.php", {id: $(this).attr("id"), modificacion: $('#Modificacion').val()}, function(htmlexterno){
          $("#area").html(htmlexterno);  
        });
    });
    $("#agregar").live("click",function(e){
        
        if(($('#nombre').val())=="" | ($('#app').val())== "" | ($('#apm').val())== "" | ($('#correo').val())== "" | ($('#puesto').val())== "" ){
           alert("Falta rellenar un campo");
           } 
        else{
            alert ("El empleado ha sido agregado exitosamente");
            $.post("agregar_empleado.php", {nombre: $('#nombre').val(), ap_paterno: $('#app').val(),ap_materno: $('#apm').val(),correo: $('#correo').val(),puesto: $('#puesto').val()}, function(htmlexterno){
          $("#area").html(htmlexterno);  
        });
        $("div.oculto").slideToggle("fast");
        }
        
    });
     $("#agregar1").live("click",function(e){
        
        if(($('#nombre').val())=="" ){
           alert("Falta rellenar un campo");
           } 
        else{
            alert ("El colegio ha sido agregado exitosamente");
            $.post("agregar_colegio.php", {nombre: $('#nombre').val()}, function(htmlexterno){
          $("#area").html(htmlexterno);  
        });
        $("div.oculto1").slideToggle("fast");
        }
    });
    $("input.btn2").live("click",function(){  
        $("div.oculto").slideToggle("fast");
    }); 

    $("input.colbtn").live("click",function(){  
        $("div.oculto1").slideToggle("fast");
    });
    $("input.blo").live("click",function(){  
        $("div.oculto2").slideToggle("fast");
    }); 
    $("input.blo1").live("click",function(){  
        $("div.oculto3").slideToggle("fast");
    });
    $("input.rep").live("click",function(){  
        $("div.oculto4").slideToggle("fast");
    });
    $("#agregar2").live("click",function(){
        if(($('#nombre').val())=="" |($('#app').val())==""){
           alert("Falta rellenar un campo");
           } 
        else{
            alert ("La hora de bloqueo ha sido agregado exitosamente");
            $.post("agregar_horario.php", {nombre: $('#nombre').val(),ap_paterno: $('#app').val(), inicio:$(".inicio").val(),fin: $(".fin").val(),dia: $(".dia").val()}, function(htmlexterno){
                $("#area").html(htmlexterno);  
            });
        $("div.oculto2").slideToggle("fast");
        }
        
    });
    $("#agregar3").live("click",function(){
        if(($('#nombre1').val())=="" |($('#app1').val())==""){
           alert("Falta rellenar un campo");
           } 
        else{
            alert ("La hora de bloqueo ha sido borrada exitosamente");
            $.post("borrar_horario.php", {nombre: $('#nombre1').val(),ap_paterno: $('#app1').val(), dia: $(".dia1").val()}, function(htmlexterno){
                $("#area").html(htmlexterno);  
            });
        $("div.oculto3").slideToggle("fast");
        }
        
    });
    $("#agregar4").live("click",function(e){
        if(($('#nombre').val())==""| ($('#act').val())== ""| ($('#hora_inicio').val())== "" | ($('#hora_fin').val())== "" | ($('#dia').val())== ""   | ($('#fecha').val())== ""){
           alert("Falta rellenar un campo");
           } 
        else{
            alert ("La reposición ha sido agregado exitosamente");
        }
        $.post("agregar_rep.php", {nombre: $('#nombre').val(),actividad: $('#act').val(),hora_inicio: $('#hora_inicio').val(),hora_fin: $('#hora_fin').val(),dia: $('#dia').val(),fecha: $('#fecha').val()
        },function(htmlexterno){
          $("#area").html(htmlexterno);  
        });
        $("div.oculto4").slideToggle("fast");
    });
    $("#caja1 div.wrap-hour.event").live("dblclick",function(){
       var con= confirm("¿Esta seguro que desea borrar esta actividad?"); 
        if (con==true){
            $.post("borrar_act.php",{id: $(this).find("span.time1").text(), nombre: $(this).find("span.title-event").text()}, function(htmlexterno){
                $("#area").html(htmlexterno);
            });
        }else{
           var con1= confirm("¿Quiere editar o visualizar esta actividad?"); 
            if (con1==true){
                $.post("editar_act.php",{id: $(this).find("span.time1").text(), nombre: $(this).find("span.title-event").text()}, function(htmlexterno){
                $("#area").html(htmlexterno);
            });
            } 
        }
    });
    $("#Crear-actividad").live("click",function(){
        alert ("La actividad ha sido agregada exitosamente");
        $.post("crear_act.php", {clave: $("#clave").val(), datepicker: $("#datepicker").val(), hora_inicio: $("#hora_inicio").val(), datepicker2: $("#datepicker2").val(), hora_fin: $("#hora_fin").val(), dirigido: $("#dirigido").val(), responsable_admin: $("#responsable_admin").val(), responsable_act: $("#responsable-act").val(), prioridad: $("#prioridad").val(), platica: $("#platica").val(), empleado: $("#empleado").val(), colegio: $("#colegio").val(), grado: $("#grado").val(), num_participantes: $("#num_participantes").val(), exp_1evento: $("#exp_1evento").val(), tipo_visita: $("#tipo-visita").val(), tipo_platica: $("#tipo-platica").val(), turno: $("#turno").val(), exp_2evento: $("#exp_2evento").val(), desayuno: $("#1:checked").val(), comida: $("#2:checked").val(), cena: $("#3:checked").val(),transporte: $("#transporte option:selected").text(), tag_numero: $("#tag_numero").val(), notas_transporte: $("#notas-transporte").val(), apoyo: $("#apoyo").val(), notas: $("#notas").val()}, function(htmlexterno){
            $("#area").html(htmlexterno);  
        });
    });
    
    //datepicker: $("#datepicker").val(), datepicker2: $("#datepicker2").val(),
    $("#Modificar-actividad").live("click",function(){
        alert ("La actividad ha sido modificada exitosamente");
        $.post("modificar_act.php", {id_actividad: $("#Modificar-actividad").attr("class"),clave: $("#clave").val(), hora_inicio: $("#hora_inicio").val(),  hora_fin: $("#hora_fin").val(), dirigido: $("#dirigido").val(), responsable_admin: $("#responsable_admin").val(), responsable_act: $("#responsable-act").val(), prioridad: $("#prioridad").val(), platica: $("#platica").val(), empleado: $("#empleado").val(), colegio: $("#colegio").val(), grado: $("#grado").val(), num_participantes: $("#num_participantes").val(), exp_1evento: $("#exp_1evento").val(), tipo_visita: $("#tipo-visita").val(), tipo_platica: $("#tipo-platica").val(), turno: $("#turno").val(), exp_2evento: $("#exp_2evento").val(), desayuno: $("#1:checked").val(), comida: $("#2:checked").val(), cena: $("#3:checked").val(),transporte: $("#transporte option:selected").text(), tag_numero: $("#tag_numero").val(), notas_transporte: $("#notas-transporte").val(), apoyo: $("#apoyo").val(), notas: $("#notas").val()}, function(htmlexterno){
            $("#area").html(htmlexterno);  
        });
    });
    $(".li-head").live("click",function(){
        $.post("quitar.php",{id:$(this).attr("id")},
            function(htmlexterno){
                $("#area").html(htmlexterno);  
        });
    });
    $(".li-sub").live("click",function(){
        $.post("quitar.php",{id:$(this).attr("id")},
            function(htmlexterno){
                $("#area").html(htmlexterno);  
        });
    });
     return false;
 });