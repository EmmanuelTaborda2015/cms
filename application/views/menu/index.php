<div class="page-header">
    <h1>Opciones de menú <small> mantenimiento de registros</small></h1>
</div>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Controlador</th>
            <th>Acción</th>
            <th>URL</th>
            <th>Orden</th>
            <th>Accesos</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('menu/edit/' . $register->id, "<i class='icon-edit'></i>"); ?></td>
            <td><?= $register->name ?></td>
            <td><?= $register->controller ?></td>
            <td><?= $register->action ?></td>
            <td><?= $register->url ?></td>
            <td><?= $register->menu_order ?></td>
            <td><?= anchor('menu/menu_profile/' . $register->id, "<i class='icon-random'></i>"); ?> Perfiles</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('menu/create', "<i class='icon-tasks icon-white'></i> Nuevo menú", array('class'=>'btn btn-primary')); ?>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>