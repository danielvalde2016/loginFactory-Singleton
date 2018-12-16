<?php
include_once 'users/Usuarios.php';
include "database/database.php";
/**
* sesion
*/
class Sesion
{
	public function comprobarUsuario($usuario, $password)
	{
		$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$formulario = Database::connect();
		$formulario->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$password';";
		$sesion = $formulario->query($sql);
		$row = $sesion->fetch();
		if ($usuario == $row['usuario']) {
			$usuario1 = Usuarios::comparar($row['administrador'], $row['idusuario'], $row['nombre'], $row['apellido'], $row['email'], $row['direccion'], $row['usuario'], $row['clave']);
			echo $usuario1;
		} else {
			echo "<p>No se ha podido iniciar sesion.</p>";
		}
	}
}
?>