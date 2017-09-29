<div class="page-header">
    <h1>Documentos Usuarios <small> Archivos cargados</small></h1>
</div>

<!--Format possible errors-->
<?= my_validation_success($this->session->flashdata('message')); ?>

<?= my_validation_errors(validation_errors()); ?>

<?= my_validation_alert($this->session->flashdata('alert')); ?>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th>Nombre del Archivo</th>
            <th>Creador</th>
            <th>Propietario</th>
            <th>No. Carga</th>
            <th>Ver</th>
            <th>Descargar</th>
            <th>Actualizar</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register):?>
        <tr>
            <!-- use a new segment -->
            <td><?= $register->description ?></td>
            <td><?= $register->creator ?></td>
            <td><?= $register->owner ?></td>
            <td><?= $register->count ?></td>
            <td><?= anchor(null, "<i class='icon-file'></i>", array('onclick' => "return confirm('$register->path')")); ?></td>
            <td><?= anchor('Download_File/download/' . $register->id_file, "<i class='icon-download-alt'></i>"); ?></td>
            <td><?= anchor('Upload_File/edit/' . $register->id_file, "<i class='icon-refresh'></i>"); ?></td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('upload_file/create', "<i class='icon-pencil icon-white'></i> Cargar Archivo", array('class'=>'btn btn-primary')); ?>

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
	$('#pdf').attr('data', path);
	$('#visor_pdf').dialog('open');
    return false;
}
</script>
