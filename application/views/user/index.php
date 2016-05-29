<div class="page-header">
    <h1>Usuarios <small> mantenimiento de registros</small></h1>
</div>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Login</th>
            <th>eMail</th>
            <th>Perfil</th>
            <th>Creado</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('user/edit/' . $register->id, "<i class='icon-edit'></i>"); ?></td>
            <td><?= $register->name ?></td>
            <td><?= $register->login ?></td>
            <td><?= $register->email ?></td>
            <td><?= $register->profile_name ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>

<?= anchor('user/create', "<i class='icon-user icon-white'></i> Nuevo usuario", array('class'=>'btn btn-primary')); ?>

<script type="text/javascript" src="<?php echo base_url('js/datatable.js');?>" ></script>