//Función para mostrar/ocultar los hilos
function Desplegar(i) {
    if (document.getElementsByClassName("hilosUser")[i].style.visibility == "visible") {
        document.getElementsByClassName("hilosUser")[i].style.visibility = "hidden";
    } else {
        document.getElementsByClassName("hilosUser")[i].style.visibility = "visible";
    }
}

function validacion() {

    var seudonimo = document.getElementById("seudonimo").value;
    var contrasenia1 = document.getElementById("contrasenia1").value;
    var contrasenia2 = document.getElementById("contrasenia2").value;
    var dni = document.getElementById("dni").value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var ciudad = document.getElementById("ciudad").value;
    var pais = document.getElementById("pais").value;
    var errorMSG = document.getElementById("errores");

    if( !(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(seudonimo)) ) {
        errorMSG.innerHTML = "El nombre no es valido.";
        return false;
    }
    else if (contrasenia1!=contrasenia2) {
        errorMSG.innerHTML = "Las contraseñas no coinciden.";
        return false;
    }
    else if( !(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(nombre)) ) {
        errorMSG.innerHTML = "El nombre no es valido.";
        return false;
    }
    else if( !(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(apellidos)) ){
        errorMSG.innerHTML = "El apellido no es valido.";
        return false;
    }
    else if( !(/^\d{8}$/.test(dni)) ) {
        errorMSG.innerHTML = "El DNI no es correcto.";
        return false;
    }
    else if( !(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(ciudad)) ){
        errorMSG.innerHTML = "El apellido no es valido.";
        return false;
    }
    else if( !(/^[A-Za-z\_\-\.\s\xF1\xD1]+$/.test(pais)) ){
        errorMSG.innerHTML = "El apellido no es valido.";
        return false;
    }

    return true;
}

function validacionForo() {

    var titulo = document.getElementById("titulo").value;
    var descripcion = document.getElementById("descripcion").value;

    if( titulo == null || titulo.length == 0 || titulo.length > 200 ) {
        return false;
    }
    else if( descripcion == null || descripcion.length == 0 || descripcion.length > 500 ) {
        return false;
    }

}

function validacionResp() {

    var texto = document.getElementById("texto").value;

    if( texto == null || texto.length == 0 || texto.length > 500 ) {
        return false;
    }

}