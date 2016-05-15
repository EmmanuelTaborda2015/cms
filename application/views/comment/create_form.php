<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('comment/insert', array('class'=>'form-horizontal')); ?>

<legend>Escribir comentario</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Título: ', 'article_id', array('class'=>'control-label')); ?>
    <?= form_dropdown('article_id', $articles, $this->uri->segment(3, 0)); ?>
</div>

<div class="control-group">
    <?= form_label('Contenido: ', 'content', array('class'=>'control-label')); ?>
    <?= form_textarea(array('type'=>'text', 'name'=>'content', 'id'=>'content', 'value'=>set_value('body')));?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('comment/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>