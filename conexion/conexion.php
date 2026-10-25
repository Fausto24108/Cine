<?php
	function conectar(){
		$conecta = mysqli_connect("localhost","root","","cine");
		return $conecta;
	}
?>