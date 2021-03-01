
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
                    }else formData.append("respuesta", respuestas);
                    
                    if(!correcta){
                        msjBC.error('ERROR','Pregunta sin respuesta correcta'); 
                        seguir =1;
                    }else formData.append("correcta", correcta);
                    
                }else msjBC.error('ERROR','Las respuestas deben estar separadas por -'); 
                                  
            }else{
                seguir =1;
                if(res.indexOf(',') > -1){
                    seguir =0;
                }else msjBC.error('ERROR','Las palabras deben estar separadas por comas'); 
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
                pre.list_preguntas();
                if(fjson.ack){
                    msjBC.ok('Bien!','Pregunta Ingresada'); 
                    pre.limpiar_forma();
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
    
    list_preguntas(){
        var formData = new FormData();
        formData.append("key", "Q2");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                var tb = document.getElementById('list_preguntas');
                tb.innerHTML = '';
                if(fjson.ack){
                    var list = fjson.respuesta;
                    for(var i=0; i<list.length; i++){
                        var dat = JSON.parse(list[i]);
                         tb.innerHTML += '<tr id="pregunta_'+dat.idpreguntas+'">'+
                                            '<td>'+dat.idpreguntas+'</td>'+
                                            '<td>'+dat.nombre+'</td>'+
                                            '<td>'+dat.clase+'</td>'+
                                            '<td style="display:none">'+dat.tipo+'</td>'+
                                            '<td>'+dat.respuestas+'</td>'+
                                            '<td><button type="button" class="btn btn-block btn-default" onclick="pre.editar_pregunta('+dat.idpreguntas+')">Editar</button></td>'+
                                          '</tr>';
                    }
                    //msjBC.ok('Hola','Pregunta Ingresada'); 

                }else msjBC.informacion('ERROR',fjson.respuesta); 
            }
        };
        xhttp.open("post", '../../../class/conexion.php', true);
        xhttp.send(formData);
    }
    
    editar_pregunta(id){
        var preg = document.getElementById('pregunta_'+id);
        var it_preg = preg.getElementsByTagName('td');
        console.log('it_preg',it_preg);
        document.getElementById('idpreguntas').value = it_preg[0].innerHTML;
        document.getElementById('nombre_pregunta').value = it_preg[1].innerHTML;
        document.getElementById('select_tipo').value = it_preg[3].innerHTML;
        document.getElementById('respuesta_pregunta').value = it_preg[4].innerHTML;
        //document.getElementById('nombre_pregunta').value = it_preg[1].innerHTML;
    }
    
    limpiar_forma(){
        $('#question')[0].reset();
        document.getElementById('idpreguntas').value = 0;
    }
}

var pre = new preguntas();