<div class="page-header">
    <h1>Comentarios <small> mantenimiento de comentarios</small></h1>
</div>

<?= form_open('comment/search', array('class'=>'form-search')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'search', 'id'=>'search', 'placeholder' => 'Buscar por artículo...', 'class' => 'input-medium search-query'));?>
    <?= form_button(array('type'=>'submit', 'content'=>"<i class='icon-search'></i>", 'class'=>'btn')); ?>
    <?= anchor('comment/create', 'Agregar', array('class'=>'btn btn-primary')); ?>
<?= form_close(); ?>

<table id="table_id" class="display table table-condensed table-bordered">
    <thead>
        <tr>
            <th>ID</th>
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
            <td><?= anchor('comment/edit/' . $register->id, $register->id); ?></td>
            <td><?= $register->content ?></td>
            <td><?= $register->title ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->created)); ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($register->updated)); ?></td>
            <td><?= $register->author ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>