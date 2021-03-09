/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var my_pos_actual = 0;
var my_pos_futura = 0;
class juego {
    generate_turno(){
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
        document.getElementById('btnDados').setAttribute('onclick','');
        var caer = 1+ (Math.floor(Math.random() * 6));
        
        my_pos_futura = caer;
        setTimeout(function(){
            document.getElementById('btnDados').style.backgroundImage = 'none';
            document.getElementById('btnDados').innerHTML = caer;
            setTimeout(function(){
                document.getElementById('btnDados').setAttribute('onclick','ju_ego.lanzar()');
                document.getElementById('btnDados').style.display = 'none';
            }, 1500);
            ju_ego.mostrar_pregunta();
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
