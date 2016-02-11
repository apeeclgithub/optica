<?php 

	require_once 'classDatabase.php';

	class Venta{

		private $venta;

		public function selectVenta(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(ven_id)
										FROM venta');
			$sql->execute();
			$this->venta = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->venta;

		}

		public function insertVenta($venId, $venFecha, $venValor, $cliId){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO venta (ven_id, ven_fecha, ven_valor_neto, ven_valor_iva, usuario_usu_id, cliente_cli_id) 
										VALUES (:venId, :venFecha, :venValor, 0, 1, :cliId)');
		
			$sql->bindParam(':venId', $venId);
			$sql->bindParam(':venFecha', $venFecha);
			$sql->bindParam(':venValor', $venValor);
			$sql->bindParam(':cliId', $cliId);

			$this->venta = $sql->execute();

			return $this->venta;

		}

		public function insertTipo($fecha, $venta){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO tipo (tip_id, tip_forma_pago, tip_fecha, venta_ven_id)
										VALUES (:venta, "Cheque", :fecha, :venta)');

			$sql->bindParam(':fecha', $fecha);
			$sql->bindParam(':venta', $venta);

			$this->venta = $sql->execute();

			return $this->venta;

		}

		public function insertProducto($cantidad, $venta, $producto, $valor){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO detalle (det_cantidad, venta_ven_id, producto_pro_id, det_valor) 
										VALUES (:cantidad, :venta, :producto, :valor)');
		
			$sql->bindParam(':cantidad', $cantidad);
			$sql->bindParam(':venta', $venta);
			$sql->bindParam(':producto', $producto);
            $sql->bindParam(':valor', $valor);
            
			$this->venta = $sql->execute();

			return $this->venta;

		}

		public function updateCantidad($id, $cantidad){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE producto 
										SET pro_stock = pro_stock - :cantidad
										WHERE pro_id = :id');
		
			$sql->bindParam(':id', $id);
			$sql->bindParam(':cantidad', $cantidad);

			$this->venta = $sql->execute();

			return $this->venta;

		} 
        
        public function selectVentaById($venta){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT ven_id, ven_fecha, cli_nombre, cli_direccion, cli_comuna, cli_rut, cli_fono, cli_celular
                                        FROM venta
                                        INNER JOIN cliente ON venta.cliente_cli_id = cliente.cli_id
                                        WHERE ven_id = :venta');
            
            $sql->bindParam(':venta', $venta);
            
			$sql->execute();
			$this->venta = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->venta;

		}
        
        public function selectProductVenta($venta){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT pro_codigo, pro_descripcion, det_cantidad, det_valor
                                        FROM detalle
                                        INNER JOIN producto ON producto.pro_id = detalle.producto_pro_id
                                        WHERE venta_ven_id = :venta');
            
            $sql->bindParam(':venta', $venta);
            
			$sql->execute();
			$this->venta = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->venta;

		}
        
        public function selectTotalVenta($venta){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT ven_valor_neto, ven_fecha
                                        FROM venta
                                        WHERE ven_id = :venta');
            
            $sql->bindParam(':venta', $venta);
            
			$sql->execute();
			$this->venta = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->venta;

		}

	}

?>