<div class="page-header">
    <h1>Artículos <small> mantenimiento de noticias</small></h1>
</div>
<span class="glyphicon glyphicon-edit"></span>
<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Título</th>
            <th>Cuerpo</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Autor</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('article/edit/' . $register->id, "<i class='icon-edit'></i>"); ?></td>
            <td><?= $register->title ?></td>
            <td><?= $register->body ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
            <td><?= $register->author ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('article/create', "<i class='icon-pencil icon-white'></i> Agregar noticia", array('class'=>'btn btn-primary')); ?>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>