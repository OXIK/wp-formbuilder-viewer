<h1>Resultados de los formularios</h1>
<p>A continuación se le presenta un listado con todas las solicitudes de presupuesto:</p>

<?php
	global $wpdb;

	$queryData = $wpdb->get_results( 'SELECT * FROM wp_formbuilder_results', OBJECT);
	$result = [];

	foreach ($queryData as $key => $data) {
		$dataResult = [];
		$dataResult['id']     = $key += 1;
		$dataResult['date']   = $data->timestamp;

		preg_match("/<FormSubject>([^<]*)<\/FormSubject>/", $data->xmldata, $dataResult['seguro']);
		preg_match("/<correo>([^<]*)<\/correo>/", $data->xmldata, $dataResult['correo']);
		preg_match("/<nombre>([^<]*)<\/nombre>/", $data->xmldata, $dataResult['nombre']);

		$dataResult['seguro'] = $dataResult['seguro'][1];
		$dataResult['correo'] = $dataResult['correo'][1];
		$dataResult['nombre'] = $dataResult['nombre'][1];

		$result[] = $dataResult;
	}
?>

<table>
	<tr>
		<th>id</th>
		<th>Seguro</th>
		<th>Nombre</th>
		<th>Correo de contacto</th>
		<th>Acciones</th>
	</tr>
	<?php
		foreach ($result as $listItem) {
			echo "<tr><td>".$listItem['id']."</td>",
				 "<td>".$listItem['seguro']."</td>",
				 "<td>".$listItem['nombre']."</td>",
				 "<td>".$listItem['correo']."</td>",
				 "<td><a href='#'>Ver formulario</a></tr>";
		}
	?>
</table>