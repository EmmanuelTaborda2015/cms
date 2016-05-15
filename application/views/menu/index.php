<div class="page-header">
    <h1>Opciones de menú <small> mantenimiento de registros</small></h1>
</div>

<?= form_open('menu/search', array('class'=>'form-search')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'search', 'id'=>'search', 'placeholder' => 'Buscar por nombre...', 'class' => 'input-medium search-query'));?>
    <?= form_button(array('type'=>'submit', 'content'=>"<i class='icon-search'></i>", 'class'=>'btn')); ?>
    <?= anchor('menu/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
<?= form_close(); ?>

<table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Controlador</th>
            <th>Acción</th>
            <th>URL</th>
            <th>Orden</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Accesos</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($query as $register): ?>
        <tr>
            <!-- use a new segment -->
            <td><?= anchor('menu/edit/' . $register->id, $register->id); ?></td>
            <td><?= $register->name ?></td>
            <td><?= $register->controller ?></td>
            <td><?= $register->action ?></td>
            <td><?= $register->url ?></td>
            <td><?= $register->menu_order ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
            <td><?= anchor('menu/menu_profile/' . $register->id, '<i class="icon-lock"></i>'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>