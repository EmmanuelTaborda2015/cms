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
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= $register->description ?></td>
            <td><?= anchor('Download_File/see/' . $register->id_file, "<i class='icon-file'></i>"); ?></td>
            <td><?= anchor('Download_File/download/' . $register->id_file, "<i class='icon-download-alt'></i>"); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <object type="application/pdf" data="http://www.it-docs.net/ddata/18.pdf" width="500" height="650">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>