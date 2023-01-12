<h1>Crear una nueva categoria</h1>

<form action="<?=BASE_URL?>/categoria/save" method="POST">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required>

<input type="submit" value="Guardar" >

</form>