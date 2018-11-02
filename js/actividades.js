    //Plancha la clave de la actividad seleccionada, en un input de lectura.
$('#num_participantes').on('blur',function(){
    var num=$(this).val();
    if(num>=100){
        $.post("buscar1.php",{id:$("#colegio").val(),colegio:$("#colegio option:selected").attr("id")},function(htmlexterno){
            $("#apoyo").val(htmlexterno);
        });
    }
});
$('select#empleado').on('change',function(){
    var valor = $(this).val();
    $.post("buscar2.php",{id:valor},function(htmlexterno){
        $("#responsable_admin").val(htmlexterno);
    });
});
$('select#tipo-actividad').on('change',function(){
   var valor = $(this).val();
   $("#clave").val(valor);
});
$('select#colegio').on('change',function(){
    var valor =  $("#colegio option:selected").attr("id");
    $.post("buscar.php",{cp:valor},function(htmlexterno){
            $("#responsable-act").val(htmlexterno);
    });
});
      /*Funcion para cambiar el idioma a espanol y seleccionar la fecha actual como predeterminada*/
    $(function() {
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker").datepicker({
            firstDay: 1
        }).datepicker("setDate", new Date());
    });
    
     $(function() {
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker2").datepicker({
            firstDay: 1
        }).datepicker("setDate", new Date());
    });
