<div class="page-header">
    <h1>Profiles <small> mantenimiento de registros</small></h1>
</div>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Creado</th>
            <th>Modificado</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('profile/edit/' . $register->id, "<i class='icon-edit'></i>"); ?></td>
            <td><?= $register->name ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('profile/create', "<i class='icon-user icon-white'></i> Agregar perfil", array('class'=>'btn btn-primary')); ?>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>