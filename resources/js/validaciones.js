
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
        for(var i=0; i > botones1.length; i++){
            if(botones1[i].indexOf('sombra') > -1) dificultad = botones1[i].value;
        }
        for(var i=0; i > botones2.length; i++){
            if(botones2[i].indexOf('sombra') > -1) extencion = botones2[i].value;
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
                        setTimeout(function(){ location.href = "resources/views/tablero.php"; }, 3000);
                    }else setTimeout(function(){ location.href = "resources/views/aviso.php"; }, 3000);
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