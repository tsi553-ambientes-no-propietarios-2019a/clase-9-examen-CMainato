<?php 
include('common/utils.php');
//print_r($_SESSION['user']);
$productos = getProducts($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
</head>
<body>
    <h1>Administrador</h1>


<h1>Productos</h1>
    <form action="php/process_product.php" method="post">
    	<div>

        <input type="text" name="nombre" placeholder="Nombre">
    </div>
    


    
<div>
        <input type="text" name="precio" placeholder="Precio">
         </div>
<br>
			  <button>Ingresar</button>
          <br>
       <table BORDER>
<h1>Productos registrados</h1>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                
            </tr>
        </thead>

        <tbody>
            

            <?php foreach ($productos as $p) { ?>

                <tr>
                    <div align="right">
                    <td><?php echo $p['Nombre'] ?></td>
                    <td><?php echo $p['Precio'] ?></td>
                    
                    </div>
                </tr>
            <?php } ?>
        </tbody>
      
    </table>
    </form>
</body>
</html>








