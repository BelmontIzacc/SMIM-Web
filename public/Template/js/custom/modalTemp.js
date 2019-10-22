	function proyecto($txt,$id) {
		
		$informacion = $txt[$id];
		$tam = Object.keys($txt[$id]).length+1;

		document.getElementById("exampleModalLongTitle").innerHTML = "Coordenada "+$id;
		var arr;
		var row = 0;

		for (var i = 1; i < $tam; i++) {

			var newTr = document.createElement("tr"); 
			
			var linea = $informacion[i];
			arr = linea.split(',');

			$val = ""+i;
			document.getElementById("id "+row).innerHTML = $val.bold();

			$val = ""+arr[0];
			document.getElementById("cC "+row).innerHTML = $val.bold();

			$val = ""+arr[1];
			document.getElementById("cK "+row).innerHTML = $val.bold();

			$val = ""+arr[2];
			document.getElementById("cF "+row).innerHTML = $val.bold();
			
			row = row + 1;

		}

	}