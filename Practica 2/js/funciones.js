//Función para mostrar/ocultar los hilos
function Desplegar(i) {
    if (document.getElementsByClassName("hilosUser")[i].style.visibility == "visible") {
        document.getElementsByClassName("hilosUser")[i].style.visibility = "hidden";
    } else {
        document.getElementsByClassName("hilosUser")[i].style.visibility = "visible";
    }
}