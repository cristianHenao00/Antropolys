
class validaciones {

    select_config(btn, id){
        if(!(btn.getAttribute('class').indexOf('sombra') > -1)){
            var contentPadre = document.getElementById('contentConfig_btns'+id);
            var botones = contentPadre.getElementsByClassName('btn');
            for(var i=0;i < botones.length; i++) botones[i].classList.remove("sombra");
            btn.classList.add("sombra");
        }

    }

    save_config(){
        var dificultad = null; 
        var extencion = null;
        var contentPadre1 = document.getElementById('contentConfig_btns1');
        var botones1 = contentPadre1.getElementsByClassName('btn');
        var contentPadre2 = document.getElementById('contentConfig_btns2');
        var botones2 = contentPadre2.getElementsByClassName('btn');

        for(var i=0; i < botones1.length; i++){
            var val = botones2[i].id.split('_');
            if(botones1[i].getAttribute('class').indexOf('sombra') > -1) dificultad = val[1];
        }
        for(var i=0; i < botones2.length; i++){
            var val = botones2[i].id.split('_');
            if(botones2[i].getAttribute('class').indexOf('sombra') > -1) extencion = val[1];
        }
       
        if(dificultad && extencion) {
            var formData = new FormData();           
            formData.append("key", "C2");
            formData.append("nivel", dificultad);
            formData.append("longitud", extencion);
            ////Enviar objeto a crear
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var fjson = JSON.parse(this.responseText);
                    if(fjson.ack){
                        var tab = extencion == 1 ?'tableroNormal':'tableroLargo';
                        setTimeout(function(){ location.href = "/resources/views/"+tab+".php"; }, 2000);
                    }else setTimeout(function(){ location.href = "aviso.php"; }, 3000);
                    msjBC.informacion('INFORMACIÓN',fjson.respuesta); 
                }
            };
            xhttp.open("post", '../../class/conexion.php', true);
            xhttp.send(formData);
        
        }
        else msjBC.informacion('ERROR','Seleccione la configuración');
    }


}

var vari = new validaciones();