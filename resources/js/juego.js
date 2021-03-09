/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var my_pos_actual = 0;//la posicion en la que el jugador está
var my_pos_futura = 0;//el marcado de los dados
var my_pos_posible = 0;//la suma de la actual y la futura
var largo_juego = 0;
class juego {
    generate_turno(){
        if(eljuego.idlongitud == 1){
            if(window.location.pathname != '/resources/views/tableroNormal.php'){
               var n = window.location.href.replace('/resources/views/tableroLargo.php','/resources/views/tableroNormal.php') 
               window.location.href = n;
            }
        }else{
            if(window.location.pathname != '/resources/views/tableroLargo.php'){
               var n = window.location.href.replace('/resources/views/tableroNormal.php','/resources/views/tableroLargo.php') 
               window.location.href = n;
            }
        }
        largo_juego = (eljuego.idlongitud == 1)? 40:80;

        var formData = new FormData();           
        formData.append("key", "C1");
        ////Enviar objeto a crear
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                msjBC.informacion('INFORMACIÓN',fjson.respuesta); 
                if(fjson.ack > 1) document.getElementById('btnDados').style.display = 'none';
                ju_ego.verificate_primer_turno();
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
        
    }
    verificate_primer_turno(){
        var formData = new FormData();           
        formData.append("key", "Q1");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                console.log('fjson',fjson);
                if(fjson.respuesta == 'Sin respuestas' && fjson.ack == 1){//solo si voy a inicar el juego
                    msjBC.informacion('INFORMACIÓN','Te toca'); 
                }
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
    lanzar(){
        document.getElementById('btnDados').style.backgroundImage = 'url(../assets/dadomorado.gif)';
        document.getElementById('btnDados').style.backgroundSize = '75%';
        document.getElementById('btnDados').setAttribute('onclick','');
        my_pos_futura = 1+ (Math.floor(Math.random() * 6));
        
        setTimeout(function(){
            //document.getElementById('btnDados').style.backgroundImage = 'none';
            document.getElementById('btnDados').innerHTML = my_pos_futura;
            my_pos_posible = my_pos_actual + my_pos_futura;
            if(my_pos_posible > largo_juego) my_pos_posible = largo_juego;
            
            /*var btn_posible = document.getElementById('posicion_'+my_pos_posible);
            btn_posible.getElementsByClassName('posicionGris')[0].style.display = 'none';
            btn_posible.getElementsByClassName('posicionAzul')[0].style.display = 'block';*/
            
            var avatar_posible = document.getElementById('btnPosicion_'+my_pos_posible);
            avatar_posible.style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+usuario.img+'.png)'
            avatar_posible.classList.add("flash");
            avatar_posible.style.display = 'block';
            
            console.log('eljuego',eljuego);
            console.log('usuario',usuario);
            
            /*setTimeout(function(){
             * document.getElementById('btnDados').style.backgroundSize = '100%';
                document.getElementById('btnDados').setAttribute('onclick','ju_ego.lanzar()');
                document.getElementById('btnDados').style.display = 'none';
                ju_ego.mostrar_pregunta();
            }, 3000);*/
            
        }, 2000);
    }
    
    
    mostrar_pregunta(){
        //sacar la ventana de la pregunta
        //estructurar la ventana con un titulo que será la posición del numero que cayó mas la posición actual
        //con el enunciado de la pregunta y las posibles respuestas si es de opción multiple, 
        //si es abierta una caja de texto
        
    }
    
    
}

var ju_ego = new juego();
