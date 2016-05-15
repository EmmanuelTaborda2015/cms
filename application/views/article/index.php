<div class="page-header">
    <h1>Usuarios <small> mantenimiento de registros</small></h1>
</div>

<?= form_open('article/search', array('class'=>'form-search')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'search', 'id'=>'search', 'placeholder' => 'Buscar por nombre...', 'class' => 'input-medium search-query'));?>
    <?= form_button(array('type'=>'submit', 'content'=>"<i class='icon-search'></i>", 'class'=>'btn')); ?>
    <?= anchor('article/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
<?= form_close(); ?>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th>ID</th>
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
            <td><?= anchor('article/edit/' . $register->id, $register->id); ?></td>
            <td><?= $register->title ?></td>
            <td><?= $register->body ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
            <td><?= $register->author ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>