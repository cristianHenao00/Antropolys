
class preguntas {

    
    
    list_jugadores(){
        var formData = new FormData();
        formData.append("key", "Q1");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                var tb = document.getElementById('list_preguntas');
                tb.innerHTML = '';
                if(fjson.ack){
                    var list = fjson.respuesta;
                    for(var i=0; i<list.length; i++){
                        var dat = list[i];
                         tb.innerHTML += '<tr id="user_'+dat.iduser+'">'+
                                            '<td>'+dat.iduser+'</td>'+
                                            '<td>'+dat.nombre+' '+dat.apellido+'</td>'+
                                            '<td>'+dat.email+'</td>'+
                                            '<td>'+dat.ciudad+'</td>'+
                                            '<td>'+dat.fecha_nacimineto+'</td>'+
                                            '<td>'+dat.jugados+'</td>'+
                                            '<td>'+dat.ganados+'</td>'+
                                          '</tr>';
                    }
                    setTimeout(function(){ 
                        $('#jugadores').DataTable({
                            "searching": true,
                            "lengthChange": false,
                        });
                    }, 1000);
                        
                }else msjBC.informacion('ERROR',fjson.respuesta); 
            }
        };
        xhttp.open("post", '../../../class/admin.php', true);
        xhttp.send(formData);
    }
    
    
    list_partidas(){
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
                        var dat = list[i];
                         tb.innerHTML += '<tr id="juego_'+dat.idjuegos+'">'+
                                            '<td>'+dat.idjuegos+'</td>'+
                                            '<td>'+dat.creado+'</td>'+
                                            '<td>'+dat.u_creador+'</td>'+
                                            '<td>'+dat.u_ganador+'</td>'+
                                            '<td>'+dat.longitud+'</td>'+
                                            '<td>'+dat.nivel+'</td>'+
                                        '</tr>';
                    }
                    setTimeout(function(){ 
                        $('#partidas').DataTable({
                            "searching": true,
                            "lengthChange": false,
                        });
                    }, 1000);
                        
                }else msjBC.informacion('ERROR',fjson.respuesta); 
            }
        };
        xhttp.open("post", '../../../class/admin.php', true);
        xhttp.send(formData);
    }
    
    
    
    list_respuestas(){
        var formData = new FormData();
        formData.append("key", "Q3");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var fjson = JSON.parse(this.responseText);
                var tb = document.getElementById('list_preguntas');
                tb.innerHTML = '';
                if(fjson.ack){
                    var list = fjson.respuesta;
                    for(var i=0; i<list.length; i++){
                        var dat = list[i];
                         tb.innerHTML += '<tr id="pregunta_'+dat.idpreguntas+'">'+
                                            '<td>'+dat.idpreguntas+'</td>'+
                                            '<td>'+dat.nombre+'</td>'+
                                            '<td>'+dat.clase+'</td>'+
                                            '<td>'+dat.niv+'</td>'+
                                            '<td>'+dat.correctas+'</td>'+
                                            '<td>'+dat.incorrectas+'</td>'+
                                            '<td>'+dat.cero+'</td>'+
                                        '</tr>';
                    }
                    setTimeout(function(){ 
                        $('#respuestas').DataTable({
                            "searching": true,
                            "lengthChange": false,
                        });
                    }, 1000);
                        
                }else msjBC.informacion('ERROR',fjson.respuesta); 
            }
        };
        xhttp.open("post", '../../../class/admin.php', true);
        xhttp.send(formData);
    }
    
}

var pre = new preguntas();