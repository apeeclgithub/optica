<?php 

	require '../model/producto.php';

	$proId    = $_POST['proId'];

	$objProducto = new Producto();
	$json['success'] = false;
	$json['success'] = $objProducto->deleteProduct($proId);
    echo json_encode($json);

?>