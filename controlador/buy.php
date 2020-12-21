<?php
	
	include_once( '../modelo/ModeloProducto.php' );
	
	$data = json_decode( file_get_contents( 'php://input' ), true );
	
	$modeloProducto = new ModeloProducto();
	
	foreach ( $data as $producto ) {
		$modeloProducto->setId( $producto[ 'id' ] );
		$modeloProducto->setUnidades( $producto[ 'unidades' ] - $producto[ 'cantidad' ] );
		
		if ( !$modeloProducto->buy() ) $response[ 'error' ][ $producto[ 'id' ] ] = "Ha ocurrido un error durante la compra de " . $producto[ 'nombre' ];
	}
	
	if ( !isset( $response[ 'error' ] ) ) $response[ 'answer' ] = 'Bought correctly!';
	else $response[ 'answer' ] = 'One or multiple errors during buy process';
	
	echo json_encode( $response );