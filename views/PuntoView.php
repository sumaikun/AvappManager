<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>nombre</th>
			<th>conjunto</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($puntos)){ foreach ($puntos as $punto) { ?>
		<tr>
		 	<td><?php echo $punto->id ?></td>
		 	<td><?php echo $punto->nombre ?></td>
		 	<td><?php echo $conjuntos[$punto->conjunto] ?></td>
		 	<td><button onclick="editar_punto(<?php echo $punto->id ?>,'<?php echo $punto->nombre ?>')" class="btn btn-xs btn-warning">Editar</button>&nbsp<a href="<?php echo $helper->url("Punto","delete"); ?>&id=<?php echo $punto->id; ?>"  onclick="return confirm_click();"><button class="btn btn-xs btn-danger">Eliminar</button></a></td>
		</tr>	
		<?php } } ?>
	</tbody>
</table>
<button class="btn btn-primary" onclick="nuevo_punto()">Nuevo punto</button>

<script>
	function nuevo_punto()
	{
		$('#myModal4').modal('show');
	}

	function editar_punto(id,referencia)
	{
		$('#eid').val(id);
		$('input[name="ereferencia"]').val(referencia);
		$('#myModal5').modal('show');
	}
</script>