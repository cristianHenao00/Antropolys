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
            formData.append("key", "U1");
            formData.append("img", indexImg);
            ////Enviar objeto a crear
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var fjson = JSON.parse(this.responseText);
                    if(fjson.ack){
                        document.getElementById('btnUsuario').setAttribute('class','btn btnUsuario avatar'+indexImg);
                        //document.getElementById('btnUsuario').style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+indexImg+'.png)'
                        //document.getElementsByClassName('imgAvatar avatarPrincipal')[0].style.backgroundImage = 'url(../assets/imagenes_nuevas/PNG/avatar_0'+indexImg+'.png)'
                        document.getElementsByClassName('imgAvatar')[0].setAttribute('class','imgAvatar avatar'+indexImg);
                        document.getElementById('btn_cerrarAvatar').click();
                        if(usuario && usuario.img) usuario.img = indexImg;
                    }
                    msjBC.informacion('INFORMACIÓN',fjson.respuesta); 
                }
            };
            xhttp.open("post", '../../class/conexion.php', true);
            xhttp.send(formData);
        }
        else setTimeout(function(){ ; }, 3000);;
    
        
    }


}

var ava = new avatar();