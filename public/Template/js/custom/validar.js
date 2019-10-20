function interes(interes)
{
    var estadoActual = document.getElementById(interes);
 
    estadoActual.disabled = !estadoActual.disabled;
}

function imagenes(imagenes)
{
    var estadoActual = document.getElementById(imagenes);
 
    estadoActual.disabled = !estadoActual.disabled;
}

function video(video)
{
    var estadoActual = document.getElementById(video);
 
    estadoActual.disabled = !estadoActual.disabled;
}

function tipo(tipo)
{
    var estadoActual = document.getElementById(tipo);
 
    estadoActual.disabled = !estadoActual.disabled;
}

function editar(){
	var estadoActual = document.getElementById("interes");
	document.getElementById("nInteres").value = estadoActual.value;
	
    var estadoActual = document.getElementById("imagenes");
 	document.getElementById("nImagenes").value = estadoActual.value;

    var estadoActual = document.getElementById("video");
 	document.getElementById("nVideo").value = estadoActual.value;

    var estadoActual = document.getElementById("tipo");
    document.getElementById("nTipo").value = estadoActual.value;

    document.getElementById("nTipoBorrar").value = "-1";

 	document.getElementById("forms").submit();
} 

function borrar($t) {

    document.getElementById("nInteres").value = "-1";

    document.getElementById("nImagenes").value = "-1";

    document.getElementById("nVideo").value = "-1";

    document.getElementById("nTipo").value = "-1";

    document.getElementById("nTipoBorrar").value = "-1";

    document.getElementById("nTipoBorrar").value = $t.id;

    document.getElementById("forms").submit();
}