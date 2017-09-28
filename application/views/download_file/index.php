<div class="page-header">
    <h1>Descargar Archivos <small> Mis archivos</small></h1>
</div>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th>Nombre del Archivo</th>
            <th>Ver</th>
            <th>Descargar</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register):?>
        <tr>
            <!-- use a new segment -->
            <td><?= $register->description ?></td>
            <td><?= anchor(null, "<i class='icon-file'></i>", array('onclick' => "return confirm('$register->path')")); ?></td>
            <td><?= anchor('Download_File/download/' . $register->id_file, "<i class='icon-download-alt'></i>"); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<div id="visor_pdf">
	<object id="pdf" data="" type="application/pdf" width="600px" height="450px" />
</div>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>

<script>
$('#visor_pdf').dialog({
    autoOpen: false,
    title: 'Archivo',
    minHeight: 500,
    minWidth:600
});
$('#opener').click(function() {
    
});
function confirm(path) {
	//$('#pdf').attr('data', path);
	$('#visor_pdf').dialog('open');
    return false;
}
</script>
