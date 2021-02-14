var respuesta = null;
function mensajesBC(){
    
}

mensajesBC.prototype.noticia = function(tit, txt){
    
    new PNotify({
        title: tit,
        text: txt,
        hide: true
    }); 
};

mensajesBC.prototype.informacion = function(tit, txt){
    new PNotify({
        title: tit,
        text: txt,
        type: 'info',
        hide: true
    });

};


mensajesBC.prototype.ok = function(tit, txt) {
    new PNotify({
        title: tit,
        text: txt,
        type: 'success',
        hide: true
    });   
};

mensajesBC.prototype.error = function(tit, txt) {
    new PNotify({
        title: tit,
        text: txt,
        type: 'error',
        hide: true
    }); 
};

mensajesBC.prototype.no_copy = function() {
    document.getElementsByTagName("body")[0].setAttribute("oncopy", "return false");
    document.getElementsByTagName("body")[0].setAttribute("oncut", "return false");
    // IE Evitar seleccion de texto
    /*document.onselectstart = function(event){
        if(typeof  event.srcElement  == 'objet' && event.srcElement.getAttribute('contenteditable') == 'true')return true;
        else if(event.srcElement.parentElement.getAttribute('contenteditable') == 'true')return true;
        else if(event.srcElement.parentElement.parentElement.getAttribute('contenteditable') == 'true')return true;
        else if(event.srcElement.parentElement.parentElement.parentElement.getAttribute('contenteditable') == 'true')return true;
        else if(event.srcElement.parentElement.parentElement.parentElement.parentElement && event.srcElement.parentElement.parentElement.parentElement.parentElement.getAttribute('contenteditable') == 'true')return true;
        else if (event.srcElement.type != 'text' && event.srcElement.type != 'textarea' && event.srcElement.type != 'password')
            return false
        else return true;
    };
    // FIREFOX Evitar seleccion de texto
    if (window.sidebar){
        document.onmousedown = function(e){
            var obj = e.target;
            if(obj && obj.getAttribute('contenteditable') == 'true')return true;
            else if(obj.parentElement.getAttribute('contenteditable') == 'true')return true;
            else if(obj.parentElement.parentElement.getAttribute('contenteditable') == 'true')return true;
            else if(obj.parentElement.parentElement.parentElement.getAttribute('contenteditable') == 'true')return true;
            else if(obj.parentElement.parentElement.parentElement.parentElement && obj.parentElement.parentElement.parentElement.parentElement.getAttribute('contenteditable') == 'true')return true;            
            else if (obj.tagName.toUpperCase() == 'INPUT' || obj.tagName.toUpperCase() == 'TEXTAREA' || obj.tagName.toUpperCase() == 'PASSWORD')
                return true;
            else
                return false;
        }
    }*/
    // End  
};


var msjBC = new mensajesBC();
//msjBC.no_copy();


