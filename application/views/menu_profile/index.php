<div class="page-header">
    <h1>Accesos <small> mantenimiento de registros</small></h1>
</div>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Menú</th>
            <th>Perfil</th>
            <th>Modificado</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('menu_profile/edit/' . $register->id, "<i class='icon-edit'></i>"); ?></td>
            <td><?= $register->menu_name ?></td>
            <td><?= $register->profile_name ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('menu_profile/create', "<i class='icon-lock icon-white'></i> Agregar permiso", array('class'=>'btn btn-primary')); ?>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>