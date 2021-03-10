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
var turno_de = '';
var posicion_old_de = 0;

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
                }else ju_ego.conocer_mi_turno();
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
                document.getElementById('modal_pregunta').classList.add('in');
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
        
    }
    
    validate_pregunta(){
        //console.log('eljuego',eljuego);
        //console.log('usuario',usuario);
        var seguir = 0;
        var error = 0;
        if(pregunta_actual['respuesta']['tipo'] == 0){//para preguntas abiertas
            var respuesta_correcta = pregunta_actual['respuesta']['respuestas'];
            var r = document.getElementById('texto_area');
            if(/^\s*$/.test(r.value)){
                msjBC.error('ERROR','Todos los datos son obligatorios'); 
                seguir=1;
            }else{
                respuesta = r.value;
                var palabras = r.value.split(' ');
                var p2 = respuesta_correcta.split(',');
                var esta = '';
                for(var i=1; i< palabras.length; i++){
                    for(var k=0; k< p2.length; k++){
                        if(palabras[i] == p2[k]) esta += palabras[i];
                    }
                }
                if(esta == ''){
                    error = 1;
                    msjBC.error('ERROR','Respuesta incorrecta'); 
                } 
            }
        }else{//para los radio butoons
            var radios = document.getElementsByName('respuesta');
            var esta = 0;
            var er = 0;
            for(var i=0; i< radios.length; i++){
                if (radios[i].checked) {
                    esta = 1;
                    respuesta = radios[i].value;
                    if(correcta == respuesta){
                        er = 1;
                        msjBC.ok('BIEN','Respuesta correcta'); 
                    }
                }
            }
            if(esta == 0){
                seguir=1;
                msjBC.error('ERROR','Seleccione una respuesta'); 
            }
            if(er ==0){ 
                error = 1;
                msjBC.error('ERROR','Respuesta incorrecta');
            }
        }
        
        if(seguir == 0){
            var avatar_posible = document.getElementById('btnPosicion_'+my_pos_posible);
            avatar_posible.classList.remove("flash");
            if(error == 0){
                avatar_posible.style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+usuario.img+'.png)'

                var avatar_actual = document.getElementById('btnPosicion_'+my_pos_actual);
                avatar_actual? avatar_actual.style.backgroundImage = 'none': '';
                
                var btn_actual = document.getElementById('posicion_'+my_pos_actual);
                btn_actual? btn_actual.getElementsByClassName('posicionGris')[0].style.display = 'block': '';
                btn_actual? btn_actual.getElementsByClassName('posicionVerde')[0].style.display = 'none': '';
                
                var btn_posible = document.getElementById('posicion_'+my_pos_posible);
                btn_posible.getElementsByClassName('posicionGris')?btn_posible.getElementsByClassName('posicionGris')[0].style.display = 'none':'';
                btn_posible.getElementsByClassName('posicionVerde')?btn_posible.getElementsByClassName('posicionVerde')[0].style.display = 'block':'';

                my_pos_actual = my_pos_posible;
            }else{
                avatar_posible.style.backgroundImage = 'none';
                avatar_posible.style.display = 'none';
            }
            document.getElementById('modal_pregunta').classList.remove('in');
            
            //guardar respuesta y dar nuevo turno
            var formData = new FormData();           
            formData.append("key", "C2");
            formData.append("idpregunta", pregunta_actual.respuesta.idpreguntas);
            formData.append("respuesta", respuesta);
            formData.append("turno", orden_turno);
            //formData.append("idposicion", my_pos_posible);
            formData.append("idposicion", my_pos_actual);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var fjson = JSON.parse(this.responseText);
                    if(fjson.ack==1){
                        var obj = fjson.respuesta;
                        turno_de = obj.nombre+' '+obj.apellido;
                        msjBC.informacion('BIEN','Turno de '+turno_de); 
                        ju_ego.conocer_mi_turno();
                    }
                }
            };
            xhttp.open("post", '../../class/juego.php', true);
            xhttp.send(formData);
            
        }
       
    }
    
    
    conocer_mi_turno(){
        var formData = new FormData();           
        formData.append("key", "Q3");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                var obj = fjson.respuesta;
                var turno = obj.nombre+' '+obj.apellido;
                if(fjson.ack == 1){
                    msjBC.ok('VAMOS!','Mi turno'); 
                    document.getElementById('btnDados').style.display = 'inline-block';
                    document.getElementById('btnDados').style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/dados_espacio_dados.png)';
                    document.getElementById('btnDados').style.backgroundSize = '100%';
                    document.getElementById('btnDados').setAttribute('onclick','ju_ego.lanzar()');
                    document.getElementById('btnDados').innerHTML = '';
                }else {
                    if(turno != turno_de){
                        msjBC.informacion('BIEN','Turno de '+turno);
                        turno_de = turno;
                    }
                    document.getElementById('btnDados').style.display = 'none';
                    document.getElementById('btnDados').innerHTML = '';                    
                    ju_ego.conocer_mi_turno();
                }
                if(obj.pos_otro != my_pos_actual){
                    document.getElementById('btnPosicion_'+posicion_old_de)?document.getElementById('btnPosicion_'+posicion_old_de).style.display = 'none':'';
                    posicion_old_de = obj.pos_otro;

                    document.getElementById('btnPosicion_'+obj.pos_otro)?document.getElementById('btnPosicion_'+obj.pos_otro).style.display = 'block':'';
                    document.getElementById('btnPosicion_'+obj.pos_otro)?document.getElementById('btnPosicion_'+obj.pos_otro).style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+obj.img+'.png)':'';
                }
                
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
}

var ju_ego = new juego();
