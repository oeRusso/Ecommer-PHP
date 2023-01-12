<?php if(isset($_SESSION['identity'])): ?>
    <h1>Hacer Pedido</h1>
    <p>
       <a href="<?=BASE_URL?>carrito/index"> Ver los productos y el precio del pedido</a>
     </p> <br>
     <h3>Direccion para el envio:</h3>
<form action="<?=BASE_URL.'pedido/addPedido'?>" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" name="localidad" required>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar Pedido">

</form>
<?php else: ?> 
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para realizar tu pedido</p>
<?php endif ;?>