<?php
	include_once( 'Conexion.php' );
	include_once( 'Producto.php' );
	
	class ModeloProducto extends Producto {
		private $conexion;
		
		public function __construct() {
			$data = new Conexion();
			$this->conexion = new mysqli( $data->host, $data->username, $data->password, $data->database );
			$this->conexion->set_charset( 'utf-8' );
		}
		
		public function getAll() {
			$sql = "CALL getAllProductos()";
			
			$query = $this->conexion->query( $sql );
			
			$productos = array();
			while ( $row = $query->fetch_array( MYSQLI_ASSOC ) ) {
				$producto = new self();
				$producto->id = $row[ 'id' ];
				$producto->nombre = $row[ 'nombre' ];
				$producto->precio = $row[ 'precio' ];
				$producto->unidades = $row[ 'unidades' ];
				$producto->tipo = $row[ 'tipo' ];
				$producto->imagen = $row[ 'imagen' ];
				$producto = $producto->showProperties();
				
				array_push( $productos, $producto );
			}
			
			mysqli_free_result( $query );
			return $productos;
		}
		
		private function showProperties() {
			unset($this->conexion);
			return get_object_vars( $this );
		}
		
	}