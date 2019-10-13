function url($total,$pag){
	var URLactual = ""+window.location;
	//alert("URL :  "+URLactual);
	//var res = ""+URLactual.lastIndexOf("page=2");
	var div = Math.ceil($total/$pag);
	var pag = -1;

	for (var i = 1; i <= div; i++) {
		res = ""+URLactual.lastIndexOf("page="+i);
		
		if(res != -1){
			pag = i;
			//alert("Entro: "+i);
			break;
		}
	}

	//alert(pag);
	
	if(pag != -1){
		var patron = "page="+pag;
		//alert("antiguo : "+patron);
		pag = pag - 1;
		var nuevoValor = "page="+pag;
		//alert("nuevo : "+nuevoValor);
		var nuevo = URLactual.replace(patron,nuevoValor);
		//alert(nuevo);
		if(pag<=1){
			var patron = "/?page="+pag;
			var nuevoValor = "/";
			var nuevo = nuevo.replace(patron,nuevoValor);

			document.getElementById('atras').href = ""+nuevo;
		}else{
			document.getElementById('atras').href = ""+nuevo;
		}
		
	}
} 