<?php 
    require_once '../model/classVenta.php';
    require_once '../model/classCheque.php';

    $fecha = date("Y-m-d");
    $objVenta = new Venta();
    $objVenta->selectTotal($fecha);

    $total;

    foreach((array)$objVenta as $key){
        foreach($key as $key2){
            $total = $key2['SUM(ven_valor_neto)'];
        }
    }

    $objCheque = new Cheque();
    $objCheque->selectTotalCheque($fecha);

    $totalCheque;

    foreach((array)$objCheque as $key){
        foreach($key as $key2){
            $totalCheque = $key2['SUM(che_monto)'];
        }
    }
?>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashMoneySis" value="<?php echo $total-$totalCheque;?>" >
    <label class="mdl-textfield__label" for="closingCashMoneySis">Efectivo</label>
    <span class="mdl-textfield__error">Ingresar solo números</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashCheckSis" value="<?php echo $totalCheque;?>" >
    <label class="mdl-textfield__label" for="closingCashCheckSis">Cheque</label>
    <span class="mdl-textfield__error">Ingresar solo números</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashTotalSis" value="<?php echo $total;?>" >
    <label class="mdl-textfield__label" for="closingCashTotalSis">Total</label>
    <span class="mdl-textfield__error">Ingresar solo números</span>
</div>