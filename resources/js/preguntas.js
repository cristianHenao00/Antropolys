
class preguntas {

    valid_save_questions(){
        var formData = pre.validacion_campos('question');
        if(formData){
            var seguir =0;
            var res = document.getElementById('respuesta_pregunta').value;
            var tp = document.getElementById('select_tipo').value;
            console.log('tp',tp);
            if(tp == 1){//múltiple
                if(res.indexOf('-') > -1){
                    var respuestas_1 = res.split('-');
                    var respuestas = [];
                    var correcta = 0;
                    for(var i=1; i<respuestas_1.length; i++){
                        if(respuestas_1[i].indexOf('*') > -1) correcta = respuestas_1[i];
                        else respuestas.push(respuestas_1[i]);
                    }
                    if(respuestas.length <1){
                        msjBC.error('ERROR','Pregunta sin respuestas'); 
                        seguir =1;
                    }else formData.append("respuestas", respuestas);
                    
                    if(!correcta){
                        msjBC.error('ERROR','Pregunta sin respuesta correcta'); 
                        seguir =1;
                    }else formData.append("correcta", correcta);
                    
                }else msjBC.error('ERROR','Las respuestas deben estar separadas por -'); 
                                  
            }else{
                if(res.indexOf(',') == -1){
                    msjBC.error('ERROR','Las palabras deben estar separadas por ,'); 
                    seguir =1;
                } 
            }
            if(seguir == 0){
                formData.append("key", "C3");
                pre.save_questions(formData);
            }
                
        }
    }
    
    save_questions(formData){
        ////Enviar objeto a crear
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                if(fjson.ack){
                    msjBC.ok('Hola','Pregunta Ingresada'); 

                }else msjBC.informacion('ERROR',fjson.respuesta); 
            }
        };
        xhttp.open("post", '../../../class/conexion.php', true);
        xhttp.send(formData);
        
    }

    validacion_campos(form){
        var formData = new FormData();
        var data = $("#"+form).serializeArray();
        console.log("...", data);
        for(var i=0; i<data.length; i++){
            if(/^\s*$/.test(data[i].value)){
                msjBC.error('ERROR','Todos los datos son obligatorios'); 
                return false;
            }else formData.append(data[i].name, data[i].value);
        }
        return formData;
    }
}

var pre = new preguntas();