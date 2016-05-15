<div class="page-header">
    <h1>Usuarios <small> mantenimiento de registros</small></h1>
</div>

<?= form_open('user/search', array('class'=>'form-search')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'search', 'id'=>'search', 'placeholder' => 'Buscar por nombre...', 'class' => 'input-medium search-query'));?>
    <?= form_button(array('type'=>'submit', 'content'=>"<i class='icon-search'></i>", 'class'=>'btn')); ?>
    <?= anchor('user/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
<?= form_close(); ?>

<table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Login</th>
            <th>eMail</th>
            <th>Perfil</th>
            <th>Creado</th>
            <th>Modificado</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('user/edit/' . $register->id, $register->id); ?></td>
            <td><?= $register->name ?></td>
            <td><?= $register->login ?></td>
            <td><?= $register->email ?></td>
            <td><?= $register->profile_name ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>