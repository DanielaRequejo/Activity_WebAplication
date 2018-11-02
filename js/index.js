/*****************************************************
*Inicio de Sesion.                                   *
*Seccion en la que se iniciara sesion a la actividad.*
*       Autores:                                     *
*Montserrat Devars Peralta.                          * 
*David Eduardo Parra Mercado.                        *
*Daniela Requejo Fernandez.                          *
*                                                    *
*Ultima modificacion: 14 de Marzo de 2017.           *
*Fuentes de apoyo: http://codepen.io/nedev/pen/EVaGqW*
******************************************************/

//Desaparece el boton de inicio para convertirlo en el formulario
$('#login-button').click(function(){
  $('#login-button').fadeOut("slow",function(){
    $("#container").fadeIn();
    TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
  });//Log-in-button (slow)
});//Log-in-button

//Cierra la ventana con el formulario.
$(".close-btn").click(function(){
  TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
  TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
  $("#container, #forgotten-container").fadeOut(800, function(){
    $("#login-button").fadeIn(800);
  });
});
