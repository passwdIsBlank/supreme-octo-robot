<?php

include_once( '../modelo/ModeloProducto.php' );

$data = json_decode( file_get_contents( 'php://input' ), true );

$modeloProducto = new ModeloProducto();

$modeloProducto->setNombre( $data[ 'nombre' ] );
$modeloProducto->setTipo( $data[ 'tipo' ] );
$modeloProducto->setUnidades( $data[ 'unidades' ] );
$modeloProducto->setPrecio( $data[ 'precio' ] );

$pattern = '/data:image\/.+;base64,(.*)/';
preg_match( $pattern, $data[ 'file' ][ 'file64' ], $matches );

// base64-encoded image data
$encodedImageData = $matches[ 1 ];

// decode base64-encoded image data
$decodedImageData = base64_decode( $encodedImageData );

if( !is_file( "../view/images/{$data['file']['filename']}" ) ) {
	if( !is_dir( '../view/images' ) ) {
		mkdir( '../view/images' );
	}

// save image data as file
	file_put_contents( "../view/images/{$data[ 'file' ][ 'filename' ]}", $decodedImageData );
	
	$modeloProducto->setImagen( "images/{$data[ 'file' ][ 'filename' ]}" );
	
	if ( $modeloProducto->insert() ) $response['answer'] = true;
	else $response['answer'] = 'Error al insertar';
	
} else $response['answer'] = 'Error: Nombre de imagen duplicado';
	
	echo json_encode( $response );