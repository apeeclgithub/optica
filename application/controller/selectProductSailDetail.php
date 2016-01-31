<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#paginationProductsSailDetail').DataTable( {
			"pagingType": "full_numbers"
		} );
	} );
</script>
<div id="dataClient">
	<div class="fontItem">PRODUCTOS AGREGADOS A LA VENTA</div>
	<table id="paginationProductsSailDetail" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp display" cellspacing="0">
		<thead style="  cursor: pointer;">
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Código</th>
				<th class="mdl-data-table__cell--non-numeric">Descripción</th>
				<th>Cantidad</th>
				<th>P. Unitario</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once '../model/classProducto.php';
			$objProducto = new Producto();
			$objProducto->selectProductAll();

			foreach ((array)$objProducto as $key) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['pro_codigo']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['pro_descripcion']; ?></td>
						<td><input type="text" id="" name="" value=""></td>
						<td><input type="text" id="" name="" value=""></td>
						<td><input type="text" id="" name="" value=""></td>
						<td><button class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">highlight_off</i></button></td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
</div>
