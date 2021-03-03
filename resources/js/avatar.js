class avatar {

    select_avatar(btn){
        if(!(btn.getAttribute('class').indexOf('sombra') > -1)){
            var contentPadre = document.getElementById('bloqueAvatar');
            var botones = contentPadre.getElementsByClassName('btn');
            for(var i=0;i < botones.length; i++) botones[i].classList.remove("sombra");
            btn.classList.add("sombra");
        }

    }

    save_avatar(){
        var indexImg = null;
        var contentPadre = document.getElementById('bloqueAvatar');
        var botones = contentPadre.getElementsByClassName('btn');
        
        for(var i=0; i < botones.length; i++){
            var val = botones[i].id.split('_');
            if(botones[i].getAttribute('class').indexOf('sombra') > -1) indexImg = val[1];
        }

        if (indexImg) {
            var formData = new FormData();           
            formData.append("key", "C4");
            formData.append("img", indexImg);
            ////Enviar objeto a crear
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var fjson = JSON.parse(this.responseText);
                    if(fjson.ack){
                        setTimeout(function(){ location.href = "resources/views/tablero.php"; }, 3000);
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

var ava = new avatar();