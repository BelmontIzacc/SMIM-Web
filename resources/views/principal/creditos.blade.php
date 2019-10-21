<!DOCTYPE html>
<html>
<head>
  <title>SMIM Creditos</title>
  <script type="text/javascript">
    window.onload = function() {
	  // onmousemove es el evento que detecta cada movimiento
	  // del cursor sobre lo que abarca el cuerpo de la página
	  // el cual nos envía la variable 'e' que contiene clientX
	  // y clientY, las coordenadas del cursor
	  document.onmousemove = function(e) {
	    // la posición se calcula de acuerdo a X, pero
	    // se divide entre 10, para que tenga un movimiento
	    // más suave con respecto al movimiento real
	    // del cursor del mouse. Después se hace negativo,
	    // para que este sea en dirección contrario, con una
	    // sensación de desplazamiento más que de arrastre.
	    var x = -(e.clientX/700);
	    // lo mismo para Y
	    var y = -(e.clientY/50);
	    // backgroundPosition son las coordenadas del fondo
	    this.body.style.backgroundPosition = x + 'px ' + y + 'px';
	  };
	};
  </script>
  <style type="text/css">
	
	@media screen and (max-width:640px) {
  		/* reglas CSS */
	}
	@media screen and (max-width:1024px) and (min-width:640px) {
	  	/* reglas CSS */
	}
	@media screen and (min-width:1024px) {
	  	/* reglas CSS */
	}

	body{
		background: url('{{asset('/Template/images/computing.jpg')}}') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#info {
	  width: 400px;
	  text-align: center; background: #fff;
	  margin: 150px auto 0 auto;
	  padding: 30px;
	  border-radius: 5px;
	}
  </style>
</head>
<body>
<div id="info">

<table class="egt">

	  <tr>

	    <td><img src="{{asset('/Template/images/ipn.png')}}" width="70" height="60" alt="IPN"></img></td>

	    <td></td>

	    <td><img src="{{asset('/Template/images/upiiz.png')}}" width="60" height="60" alt="UPIIZ"></img></td>

	  </tr>

	  <tr>

	    <td></td>

	    <td><p>Unidad Profesional Interdisciplinaria de Ingeniería, Campus Zacatecas</p></td>

	    <td></td>

	  </tr>

	  <tr>

	    <td></td>

	    <td><p>Ingenieria en Sistemas Computacionales</p></td>

	    <td></td>

	  </tr>

	  <tr>

	    <td></td>

	    <td><p>Isaul Ibarra Belmonte</p></td>

	    <td></td>

	  </tr>

	  <tr>

	    <td></td>

	    <td><p>Olga Alejandra Beltran Silva</p></td>

	    <td></td>

	  </tr>

</table>

</div>
</body>
</html>