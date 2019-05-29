
<?php 
include('common/utils.php');

if($_GET) {
	if(isset($_GET['error_message'])) {
		$error_message = $_GET['error_message'];
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>

    <form action="php/process_registration.php" method="post">
    	<div>

        <input type="text" name="nombre" placeholder="Nombre">
    </div>
    
<div>
        <label>Tipo</label>
			<select name="type" required="required">
				<option value="">Seleccione...</option>
				<option value="Administrador">Administrador</option>
				<option value="Cliente">Cliente</option>
				
			</select>
			 </div>

    
<div>
        <input type="text" name="username" placeholder="Usuario">
         </div>

			 <div>
        <input type="password" name="password" placeholder="Clave">
         </div>
         <div>
         <input type="password" name="password1" placeholder="Repita la clave">
          </div>
          <br>
        <button>Ingresar</button>
    </form>
</body>
</html>
