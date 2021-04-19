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
var posicion_old_de = [];
var tiempo_contador = 60;
var tiempo_contador_otro = 60;
var timer = null;
var timer_otro = null;

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

                document.getElementById('txt_juguemos').innerHTML = fjson.respuesta;

                setTimeout(function(){ 
                    document.getElementById('mjuguemos').style.display = 'none';
                }, 2300);

                if(fjson.ack){
                    orden_turno = fjson.ack;
                    ju_ego.verificate_primer_turno();
                }else setTimeout(function(){ location.href = "/"; }, 2000);

                    
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
                    document.getElementById('btnDados').style.display = 'block';
                    timer = setInterval(ju_ego.showRemaining_mi, 1000);
                }else ju_ego.conocer_mi_turno();
                
                if(fjson.respuesta && fjson.respuesta.position){
                    my_pos_actual = parseInt(fjson.respuesta.position);
                    if(document.getElementById('btnPosicion_'+my_pos_actual)){
                        var avatar_posible = document.getElementById('btnPosicion_'+my_pos_actual);
                        avatar_posible.style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+usuario.img+'.png)'
                        avatar_posible.style.display = 'block';
                    }
                        
                    var btn_actual = document.getElementById('posicion_'+my_pos_actual);
                    btn_actual? btn_actual.getElementsByClassName('posicionGris')[0].style.display = 'none': '';
                    btn_actual? btn_actual.getElementsByClassName('posicionVerde')[0].style.display = 'block': '';
                    
                }
                
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
    lanzar(){
        document.getElementById('btnDados').style.backgroundImage = 'url(../assets/dados/da2.gif)';
        document.getElementById('btnDados').setAttribute('onclick','');
        my_pos_futura = 1+ (Math.floor(Math.random() * 6));
        
        setTimeout(function(){
            document.getElementById('btnDados').style.backgroundImage = 'url(../assets/dados/dado-'+my_pos_futura+'.png)';
            //document.getElementById('btnDados').innerHTML = my_pos_futura;
            my_pos_posible = my_pos_actual + my_pos_futura;
            if(my_pos_posible > largo_juego) my_pos_posible = largo_juego;
            
            var avatar_posible = document.getElementById('btnPosicion_'+my_pos_posible);
            avatar_posible.style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+usuario.img+'.png)'
            avatar_posible.classList.add("flash");
            avatar_posible.style.display = 'block';
            
            ju_ego.mostrar_pregunta();
        }, 1500);
    }
    
    
    mostrar_pregunta(){
        
        var formData = new FormData();           
        formData.append("key", "Q2");
        formData.append("idpregunta", array_preguntas[my_pos_posible-1]);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                pregunta_actual = JSON.parse(this.responseText);
                
                document.getElementById('pregunta_titulo').style.backgroundImage = 'url(../assets/dados/dado-'+my_pos_posible+'.png)';
                document.getElementById('pregunta_texto').innerHTML = pregunta_actual['respuesta']['nombre'];
                if(pregunta_actual['respuesta']['img']>0){
                    document.getElementById('imgPregunta').style.display = 'block';
                    document.getElementById('imgPregunta').setAttribute('src','../../class/class.img.php?id='+pregunta_actual['respuesta']['img']);
                }
                
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
                for(var i=0; i< palabras.length; i++){
                    for(var k=0; k< p2.length; k++){
                        if(p2[k] && p2[k] != '' && palabras[i] && palabras[i] != ''){
                            
                            palabras[i] = ju_ego.limpiar_txt_tildes_espacios(palabras[i]); 
                            p2[k] = ju_ego.limpiar_txt_tildes_espacios(p2[k]);
                            var regex2 = new RegExp(p2[k], "gi");//mayusculas y minusculas
                            if(regex2.test(palabras[i])) esta += palabras[i];
                            //if(palabras[i] == p2[k]) 
                        }
                            
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
            var gano = 0;
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
                btn_posible.getElementsByClassName('posicionGris')[0]?btn_posible.getElementsByClassName('posicionGris')[0].style.display = 'none':'';
                btn_posible.getElementsByClassName('posicionVerde')[0]?btn_posible.getElementsByClassName('posicionVerde')[0].style.display = 'block':'';

                my_pos_actual = my_pos_posible;
                if(my_pos_actual == largo_juego) gano = 1;//ganó
            }else{
                avatar_posible.style.backgroundImage = 'none';
                avatar_posible.style.display = 'none';
            }
            document.getElementById('modal_pregunta').classList.remove('in');
            
            
            ju_ego.save_respuesta(pregunta_actual.respuesta.idpreguntas, respuesta, gano);
            
            
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

                if(obj && obj.ganador != 0){//notificar que hay ganador
                    ju_ego.notoficar_ganador(obj.name_ganador);
                }else{
                    if(fjson.ack == 1){
                        msjBC.ok('VAMOS!','Mi turno'); 
                        document.getElementById('btnDados').style.display = 'block';
                        document.getElementById('btnDados').style.backgroundImage = 'url(../assets/dados/quietos_da2.png)';
                        document.getElementById('btnDados').setAttribute('onclick','ju_ego.lanzar()');
                        tiempo_contador = 60;
                        timer = setInterval(ju_ego.showRemaining_mi, 1000);
                        turno_de = obj.turno;
                        ju_ego.terminar_otro_contador();
                        
                    }else {
                        var turno1 = obj.turno;
                        var turno = obj.nombre+' '+obj.apellido;
                        if(turno1 != turno_de){
                            msjBC.informacion('BIEN','Turno de '+turno);
                            turno_de = turno1;
                            tiempo_contador_otro = 60;
                            ju_ego.llenar_oponente(obj);
                        }
                        document.getElementById('btnDados').style.display = 'none';
                        ju_ego.conocer_mi_turno();
                    }
                    
                    var posiciones_otros = fjson.turnos;
                    if(posiciones_otros && posiciones_otros.length){
                        for(var i =0; i<posiciones_otros.length; i++){
                            if(posiciones_otros[i].position != my_pos_actual){
                                
                                if(posicion_old_de && posicion_old_de[i]) document.getElementById('btnPosicion_'+posicion_old_de[i].position)?document.getElementById('btnPosicion_'+posicion_old_de[i].position).style.display = 'none':'';
                                
                                document.getElementById('btnPosicion_'+posiciones_otros[i].position)?document.getElementById('btnPosicion_'+posiciones_otros[i].position).style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+posiciones_otros[i].img+'.png)':'';
                                document.getElementById('btnPosicion_'+posiciones_otros[i].position)?document.getElementById('btnPosicion_'+posiciones_otros[i].position).style.display = 'block':'';
                                setTimeout(function(){ posicion_old_de = posiciones_otros; }, 100);
                                
                            }

                        }
                    }
                        

                }   
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
   
    notoficar_ganador(name){
        $.confirm({
            title: 'HAY GANADOR!',
            content: 'El jugador '+name,
            type: 'red',
            typeAnimated: true,
            autoClose: 'Espera|'+5000,
            buttons: {
                Espera: function () {
                    location.href = '/';
                    //sacar ranking
                    /*var formData = new FormData();
                    formData.append("key", "Q7");
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            
                            var fjson = JSON.parse(this.responseText);
                            
                        }
                    };
                    xhttp.open("post", '../../class/juego.php', true);
                    xhttp.send(formData);*/
                }
            }
        });
    }
    
    limpiar_txt_tildes_espacios(txt){
        txt = txt.replace(/([\ \t]+(?=[\ \t])|^\s+|\s+$)/g, '');//espacios
        txt = txt.replace(/\n|\r/g, "");//saltos de línea
        txt = txt.normalize("NFD").replace(/[\u0300-\u036f]/g, "");//tildes
        return txt;
    }
    
    showRemaining_mi(){
        tiempo_contador = tiempo_contador-1;
        document.getElementById('tiempoUsuarioMi').innerHTML = tiempo_contador;
        document.getElementById('tiempoUsuarioMi').style.color = '#fff';
        if(tiempo_contador>0){
            
            document.getElementById('relojUsuarioMi').style.display = 'block';
        }else ju_ego.terminar_mi_contador(1);
    }
    
    terminar_mi_contador(t=0){
        clearInterval(timer);
        document.getElementById('tiempoUsuarioMi').style.color = 'red';
        document.getElementById('tiempoUsuarioMi').classList.add("flash");
        document.getElementById('btnDados').style.display = 'none';
        document.getElementById('modal_pregunta').classList.remove('in');
        
        
        setTimeout(function(){ 
            tiempo_contador = 60;
            document.getElementById('tiempoUsuarioMi').classList.remove("flash");
            document.getElementById('relojUsuarioMi').style.display = 'none';
            
            if(t == 1){ 
                ju_ego.save_respuesta();
                document.getElementById('btnPosicion_'+my_pos_posible).style.display = 'none';
            }
            
        }, 1500);
    }
    
    showRemaining_otro(){
        tiempo_contador_otro = tiempo_contador_otro-1;
        document.getElementById('tiempoUsuario').innerHTML = tiempo_contador_otro;
        if(tiempo_contador_otro>0){
            document.getElementById('perfil_oponente').style.display = 'block';
        }else{ ju_ego.terminar_otro_contador();}
    }
    
    terminar_otro_contador(){
        clearInterval(timer_otro);
        document.getElementById('perfil_oponente').style.display = 'none';
        //ju_ego.conocer_mi_turno = null;
        if(tiempo_contador_otro < 1)    ju_ego.save_respuesta_otro(turno_de)
    }
    
    save_respuesta(idpreguntas = 0, respuesta = 0, gano = 0){
        //guardar respuesta y dar nuevo turno //pregunta_actual.respuesta.
        var formData = new FormData();           
        formData.append("key", "C2");
        formData.append("idpregunta", idpreguntas);
        formData.append("respuesta", respuesta);
        formData.append("turno", orden_turno);
        formData.append("gano", gano);
        formData.append("idposicion", my_pos_actual);
        var tim = document.getElementById('tiempoUsuarioMi').innerHTML;
        formData.append("tiempo", tim);
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                if(fjson.ack==1){
                    var obj = fjson.respuesta;
                    turno_de = obj.nombre+' '+obj.apellido;
                    msjBC.informacion('BIEN -','Turno de '+turno_de); 
                    ju_ego.terminar_mi_contador();//param en 0 para nopetir guardado
                    ju_ego.conocer_mi_turno();
                }
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
    llenar_oponente(obj){
        console.log('obj',obj);
        document.getElementById('perfil_oponente').style.display = 'block';
        document.getElementById('jugador_turno').innerHTML = obj.turno;
        document.getElementById('nombre_oponente').innerHTML = obj.nombre;
        document.getElementById('apellido_oponente').innerHTML = obj.apellido;
        
        timer_otro = setInterval(ju_ego.showRemaining_otro, 1000);
    }
    
    save_respuesta_otro(t){
        //guardar respuesta y dar nuevo turno //pregunta_actual.respuesta.
        var formData = new FormData();           
        formData.append("key", "C3");
        formData.append("turno_de", t);     
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                //if(fjson.ack==1) ju_ego.conocer_mi_turno();
            }
        };
        xhttp.open("post", '../../class/juego.php', true);
        xhttp.send(formData);
    }
    
    
}

var ju_ego = new juego();
