/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class registro{
    registrar(){
        
        var formData = false;
        formData = regi.validacion_campos('registro');
        var email = document.getElementById('emailUser');
        
        if(formData && regi.validacion_corre('emailUser')){
            var pas1 = document.getElementById('passNew');
            var pas2 = document.getElementById('passConfirmar');
            if(pas1.value != pas2.value) {
                formData = false;
                msjBC.informacion('ERROR','Las claves no son iguales'); 
            }
            
            if(formData){
                formData.append("key", "C1");
                ////Enviar objeto a crear
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var fjson = JSON.parse(this.responseText);
                        if(fjson.ack){
                            msjBC.ok('Hola','Ingresa al sistema'); 
                            setTimeout(function(){ location.href = window.location.origin; }, 3000);
                            
                        }else msjBC.informacion('ERROR',fjson.respuesta); 
                    }
                };
                xhttp.open("post", '../../class/conexion.php', true);
                xhttp.send(formData);
            }
        }
    }
    
    
    ingresar(){
        var formData = regi.validacion_campos('login');
        if(formData && regi.validacion_corre('user')){
            formData.append("key", "Q1");
            ////Enviar objeto a crear
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var fjson = JSON.parse(this.responseText);
                    if(fjson.ack){
                        if(fjson.respuesta == "Juego nuevo"){
                            setTimeout(function(){ location.href = "resources/views/configuracion.php"; }, 3000);
                        }else{
                            setTimeout(function(){ location.href = "resources/views/aviso.php"; }, 3000);
                        }
                        console.log('...',fjson);
                        
                    }else msjBC.informacion('ERROR',fjson.respuesta); 
                }
            };
            xhttp.open("post", '../../class/conexion.php', true);
            xhttp.send(formData);
        }
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
    
    
    validacion_corre(id){
        var email = document.getElementById(id);
        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email.value)) ){
            msjBC.informacion('ERROR','El correo no es válido'); 
            return false;
        }
        return true;
    }

    
}

var regi = new registro();