	function proyecto($p) {

		document.getElementById("exampleModalLongTitle").innerHTML = "Borrar: "+$p.nombreProyecto;
		$nombreP = "Nombre del proyecto: ";
		document.getElementById("nombreP").innerHTML = $nombreP.bold()+""+$p.nombreProyecto;

		$folio = "Folio: ";
		document.getElementById("folio").innerHTML = $folio.bold()+""+$p.noSerie;

		$tipo = "Tipo: ";
		document.getElementById("tipo").innerHTML = $tipo.bold()+""+$p.tipo.nombre;

		$usuario = "Usuario: ";
		document.getElementById("usuario").innerHTML = $usuario.bold()+""+$p.nombreAlumno;

		$fecha = $p.fechaCreacion;
		$d = $fecha.split('-');

		$fecha = "Fecha: ";
		document.getElementById("fecha").innerHTML = $fecha.bold()+""+$d[2]+"-"+$d[1]+"-"+$d[0];

		$tp = "Tiempo de Analisis: ";
		document.getElementById("ta").innerHTML = $tp.bold()+""+$p.tiempoAnalisis;

 		document.getElementById("proyecto").value = $p.noSerie;
	}

	function borrar() {
		$boton = document.getElementById("proyecto");
	 	document.getElementById("borrar").value = $boton.value;

	 	document.getElementById("forms").submit();
	}