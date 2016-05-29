<div class="page-header">
    <h1>Comentarios <small> mantenimiento de comentarios</small></h1>
</div>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Comentario</th>
            <th>Artículo</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Autor</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('comment/edit/' . $register->id, "<i class='icon-edit'></i>"); ?></td>
            <td><?= $register->content ?></td>
            <td><?= $register->title ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
            <td><?= $register->author ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('comment/create', "<i class='icon-pencil icon-white'></i> Agregar comentario", array('class'=>'btn btn-primary')); ?>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>