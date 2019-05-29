<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['nombre']) && isset($_POST['precio']) && !empty($_POST['nombre']) && !empty($_POST['precio'])) {

		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		

		

		$sql_insert = "INSERT INTO productos
		(Nombre, Precio)
		VALUES ('$nombre','$precio')";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../admin.php');
		}
	} else {
		redirect('../registro.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../registro.php');
}