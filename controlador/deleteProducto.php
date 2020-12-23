<?php
	
	include_once( '../modelo/ModeloProducto.php' );
	
	$data = json_decode( file_get_contents( 'php://input' ), true );
	
	$modeloProducto = new ModeloProducto();
	$modeloProducto->setId( $data[ 'id' ] );
	
	$success = $modeloProducto->delete();
	
	if ( $success ) {
		$imagePath = $modeloProducto->getImagen();
		
		if ( !is_int( strpos( $imagePath, 'http' ) ) ) unlink( "../view/{$imagePath}" );
		$response['answer'] = 'Deletion was successful';
	}
	else $response['answer'] = 'Deletion was unsuccessful';
	
	echo json_encode( $response );