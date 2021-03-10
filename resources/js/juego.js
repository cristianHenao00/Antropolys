/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var my_pos_actual = 0;//la posicion en la que el jugador está
var my_pos_futura = 0;//el marcado de los dados
var my_pos_posible = 0;//la suma de la actual y la futura
var largo_juego = 0;//longitud del juego normal,corto = 40  largo=80
var array_preguntas = [];//array del id de las preguntas del juego
var pregunta_actual = {}; //obj de la pregunta realizada
var orden_turno = 0;
var correcta = 0;
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
        array_preguntas = eljuego.preguntas.split(',');
        
        var formData = new FormData();           
        formData.append("key", "C1");
        ////Enviar objeto a crear
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                msjBC.informacion('INFORMACIÓN',fjson.respuesta); 
                if(fjson.ack > 1) document.getElementById('btnDados').style.display = 'none';
                orden_turno = fjson.ack;
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
            document.getElementById('btnDados').style.backgroundImage = 'none';
            document.getElementById('btnDados').innerHTML = my_pos_futura;
            my_pos_posible = my_pos_actual + my_pos_futura;
            if(my_pos_posible > largo_juego) my_pos_posible = largo_juego;
            
            var avatar_posible = document.getElementById('btnPosicion_'+my_pos_posible);
            avatar_posible.style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+usuario.img+'.png)'
            avatar_posible.classList.add("flash");
            avatar_posible.style.display = 'block';
            
            setTimeout(function(){
                document.getElementById('btnDados').style.backgroundSize = '100%';
                document.getElementById('btnDados').setAttribute('onclick','ju_ego.lanzar()');
                //document.getElementById('btnDados').style.display = 'none';
                document.getElementById('modal_pregunta').classList.add('in');
            }, 3000);
            ju_ego.mostrar_pregunta();
        }, 2000);
    }
    
    
    mostrar_pregunta(){
        
        var formData = new FormData();           
        formData.append("key", "Q2");
        formData.append("idpregunta", array_preguntas[my_pos_posible-1]);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                pregunta_actual = JSON.parse(this.responseText);
                var temporal = 1;
                console.log(pregunta_actual['respuesta']);
                document.getElementById('pregunta_titulo').innerHTML = my_pos_posible;
                document.getElementById('pregunta_texto').innerHTML = pregunta_actual['respuesta']['nombre'];
                if(pregunta_actual['respuesta']['tipo'] == 0){
                    var areaText = '<textarea class="textoArea" id="texto_area"> </textarea>' ;
                    document.getElementById('texto_respuesta').innerHTML = areaText;
                }else{
                    var respuesta_actual = pregunta_actual['respuesta']['respuestas'];
                    var res = respuesta_actual.split('-');
                    var areaRadio = '<div class="row boxRadio">';
                    for(var i=1; i<res.length; i++){
                        if(res[i].indexOf('*') > -1) correcta = i;
                        var tx = res[i].replace('*','');
                        areaRadio += `<input id="r${i}" type="radio" name="respuesta" value="${i}"> <label class="etiqueta" for="r1"> ${res[0]} </label>${tx}<br>`;
                    }
                    areaRadio +='</div>';
                    document.getElementById('texto_respuesta').innerHTML = areaRadio;
                    
                }
                document.getElementById('btnPregunta').setAttribute('onclick','ju_ego.validate_pregunta()');        
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
        
    }
    
    validate_pregunta(){
        //console.log('eljuego',eljuego);
        //console.log('usuario',usuario);
        if(pregunta_actual['respuesta']['tipo'] == 0){
            respuesta_correcta = pregunta_actual['respuesta']['respuestas'];
            
        }else{
            respuesta_correcta =correcta;
        }
        var avatar_posible = document.getElementById('btnPosicion_'+my_pos_posible);
        avatar_posible.classList.remove("flash");
        if(respuesta_correcta == respuesta){
            //letrero de respuesta correcta
            avatar_posible.style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+usuario.img+'.png)'
            
            var avatar_actual = document.getElementById('btnPosicion_'+my_pos_actual);
            avatar_actual? avatar_actual.style.backgroundImage = 'none': '';
            
            var btn_posible = document.getElementById('posicion_'+my_pos_posible);
            btn_posible.getElementsByClassName('posicionGris')[0].style.display = 'none';
            btn_posible.getElementsByClassName('posicionVerde')[0].style.display = 'block';
            
            my_pos_actual = my_pos_posible;
        }else{
            //letrero de respuesta incorrecta
            avatar_posible.style.backgroundImage = 'none';
            avatar_posible.style.display = 'none';
        }
        
        //guardar respuesta y dar nuevo turno
        var formData = new FormData();           
        formData.append("key", "C1");
        formData.append("idpregunta", pregunta_actual.idpreguntas);
        formData.append("respuesta", '');
        formData.append("turno", orden_turno);
        formData.append("idposicion", my_pos_posible);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                console.log('fjson---',fjson);

                
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
    
}

var ju_ego = new juego();
