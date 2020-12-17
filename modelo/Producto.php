<?php
	
	
	class Producto {
		protected $id;
		protected $nombre;
		protected $precio;
		protected $unidades;
		protected $tipo;
		protected $imagen;
		
		/**
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}
		
		/**
		 * @param mixed $id
		 */
		public function setId( $id ) {
			$this->id = $id;
		}
		
		/**
		 * @return mixed
		 */
		public function getNombre() {
			return $this->nombre;
		}
		
		/**
		 * @param mixed $nombre
		 */
		public function setNombre( $nombre ) {
			$this->nombre = $nombre;
		}
		
		/**
		 * @return mixed
		 */
		public function getPrecio() {
			return $this->precio;
		}
		
		/**
		 * @param mixed $precio
		 */
		public function setPrecio( $precio ) {
			$this->precio = $precio;
		}
		
		/**
		 * @return mixed
		 */
		public function getUnidades() {
			return $this->unidades;
		}
		
		/**
		 * @param mixed $unidades
		 */
		public function setUnidades( $unidades ) {
			$this->unidades = $unidades;
		}
		
		/**
		 * @return mixed
		 */
		public function getTipo() {
			return $this->tipo;
		}
		
		/**
		 * @param mixed $tipo
		 */
		public function setTipo( $tipo ) {
			$this->tipo = $tipo;
		}
		
		/**
		 * @return mixed
		 */
		public function getImagen() {
			return $this->imagen;
		}
		
		/**
		 * @param mixed $imagen
		 */
		public function setImagen( $imagen ) {
			$this->imagen = $imagen;
		}
	}