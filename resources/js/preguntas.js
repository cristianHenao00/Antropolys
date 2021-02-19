
class preguntas {

    save_questions(user){
        var formData = pre.validacion_campos('question');
        // if(formData){
        //     formData.append("key", "C3");
        //     ////Enviar objeto a crear
        //     var xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             var fjson = JSON.parse(this.responseText);
        //             if(fjson.ack){
        //                 console.log("estoaqui")
        //                 msjBC.ok('Hola','Pregunta Ingresada'); 
                        
        //             }else msjBC.informacion('ERROR',fjson.respuesta); 
        //         }
        //     };
        //     xhttp.open("post", '../../../class/conexion.php', true);
        //     xhttp.send(formData);
        // }
    }

    validacion_campos(form){
        var formData = new FormData();
        var data = $("#"+form).serializeArray();
        console.log("...", data)
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