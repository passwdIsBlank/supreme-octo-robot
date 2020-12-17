<?php

	include_once ('../modelo/ModeloProducto.php');
	
	$modeloProducto = new ModeloProducto();
	
	$response['answer'] = $modeloProducto->getAll();
	
	echo json_encode( $response );