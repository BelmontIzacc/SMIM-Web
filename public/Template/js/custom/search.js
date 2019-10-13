function search(e){
    tecla = (document.all) ? e.keyCode : e.which;
  	if (tecla==13){
  		document.getElementById("busqueda").value = document.getElementById("search").value;
    	document.getElementById("form").submit();  
  	}
    //alert(document.getElementById("idVal").value);
} 
