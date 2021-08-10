(function() {
    'use strict';
    let regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function(){

    //mapa

    if (document.getElementById('mapa')) {
        var map = L.map('mapa').setView([-34.608429, -58.372175], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        L.marker([-34.608429, -58.372175]).addTo(map).bindPopup('BAWEBCAMP 2021').openPopup();

    }

    //Campos Datos Usuario
        let nombre = document.getElementById('nombre');
        let apellido = document.getElementById('apellido');
        let email = document.getElementById('email');
  
    //Campos Pases

        let pase_dia = document.getElementById('pase_dia');
        let pase_dos_dias = document.getElementById('pase_dos_dias');
        let pase_completo = document.getElementById('pase_completo');

    //Botones y divs

        let calcular = document.getElementById('calcular');
        let errorDiv = document.getElementById('error');
        let botonRegistro = document.getElementById('btnRegistro');
        let lista_productos = document.getElementById('lista-productos');
        let suma = document.getElementById('suma-total');
    //Extras

        let etiquetas = document.getElementById('etiquetas');
        let camisas = document.getElementById('camisa_evento');
    
        botonRegistro.disabled = true;
    //---------
    if(document.getElementById('calcular')){ //addEventListener ERROR
        calcular.addEventListener('click', calcularMontos);
        pase_dia.addEventListener('blur', mostrarDias);
        pase_dos_dias.addEventListener('blur', mostrarDias);
        pase_completo.addEventListener('blur', mostrarDias);

        nombre.addEventListener('blur', validar);
        apellido.addEventListener('blur', validar);
        email.addEventListener('blur', validar);
        email.addEventListener('blur', validarMail);

        function validar(){
            if(this.value == ''){
                errorDiv.style.display='block';
                errorDiv.innerHTML = "Ups! Te falta completar este campo obligatorio";
                this.style.border = '1px solid red';
            } else{
                errorDiv.style.display = 'none';
                this.style.border = '1px solid grey';
            }
        }

        function validarMail(){
            if(this.value.indexOf('@')>-1){
                errorDiv.style.display = 'none';
                this.style.border = '1px solid grey';
            } else{
                errorDiv.style.display='block';
                errorDiv.innerHTML = "Ups! Parece que tu mail es incorrecto.";
                this.style.border = '1px solid red';
            }
        }
        
        function calcularMontos(event){
            
            event.preventDefault();
            if(regalo.value === ''){
                alert("Debes elegir un regalo");
                regalo.focus();
            } else{
                let boletosDia = parseInt(pase_dia.value, 10 )|| 0, 
                    boletos2Dias = parseInt(pase_dos_dias.value,10 )|| 0, 
                    boletoCompleto = parseInt(pase_completo.value,10 )|| 0, 
                    cantCamisas = parseInt(camisas.value,10 )|| 0, 
                    cantEtiquetas = parseInt(etiquetas.value,10 )|| 0; 
            
                let totalPagar = (boletosDia * 30)+(boletos2Dias * 45)+(boletoCompleto*50) + ((cantCamisas * 10)*.93) + (cantEtiquetas*2);
                
                
                let listadoProductos = [];

                if(boletosDia>=1){
                    listadoProductos.push(boletosDia + ' pases por dia');
                }
                if(boletos2Dias>=1){
                    listadoProductos.push(boletos2Dias + ' pases por dos días');

                }
                if(boletoCompleto>=1){
                   listadoProductos.push(boletoCompleto + ' pases completos');
                }
                if(cantCamisas>=1){
                    listadoProductos.push(cantCamisas + ' camisas');
                }
                if(cantEtiquetas>=1){
                    listadoProductos.push(cantEtiquetas + ' etiquetas');
                }
                
                
                lista_productos.innerHTML = '';
                lista_productos.style.display = "block";
                for(var i=0; i<listadoProductos.length; i++){
                    lista_productos.innerHTML += listadoProductos[i] + '<br/>'
                }
                
                suma.innerHTML = '$ ' + totalPagar.toFixed(2);
                
                botonRegistro.disabled = false;
                document.getElementById('total_pedido').value = totalPagar;
            }
        }

        function mostrarDias(){
            let boletosDia = parseInt(pase_dia.value, 10 )|| 0, 
                boletos2Dias = parseInt(pase_dos_dias.value,10 )|| 0, 
                boletoCompleto = parseInt(pase_completo.value,10 )|| 0;
               
            let diasElegidos = [];

            if(boletosDia>0){
                diasElegidos.push('viernes');
            } 
            if(boletos2Dias>0){
                diasElegidos.push('viernes', 'sabado');
            }
            if(boletoCompleto>0){
                diasElegidos.push('viernes', 'sabado', 'domingo');
            }
            for(var i=0; i<diasElegidos.length;i++){
                document.getElementById(diasElegidos[i]).style.display='block';
            }
        }
    }

        });//DOM CONTENT LOADED
})();

//JQuery 

$('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
$('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
$('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

$(function(){
    //menu fijo
    let windowHeight = $(window).height();
    let navHeight = $('.barra').innerHeight();

    $(window).scroll(function(){
        let scroll = $(window).scrollTop();
        if(scroll>windowHeight){
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': navHeight+'px'});
        } else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top': '0px'});
        }
    });

    //menu responsive
    $('.menu-movil').on('click', function(){
        $('.navegacion-principal').slideToggle();
    });

    //Ocultando y mostrando Tabs de conferencias
    $('.programa-evento .info-curso:first').show(); //mostrando solo la primer tab
    $('.menu-programa a:first').addClass('activo'); 
    $('.menu-programa a').on('click', function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        let enlace = $(this).attr('href'); //seleccionando el # de donde hago click
        $(enlace).fadeIn(1000);
        return false; //para que no salte cuando selecciono el enlace de la tab
   });

   //AnimateNumber para el conteo
   $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
   $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
   $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1200);
   $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1200);

   //Cuenta regresiva
   $('.cuenta-regresiva').countdown('2021/12/10 09:00:00', function(event){
    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
   });

   //Colorbox

   $('.invitado-info').colorbox({inline: true, width: "50%"});

});




