<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('article/insert', array('class'=>'form-horizontal')); ?>

<legend>Crear registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Título: ', 'title', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'title', 'id'=>'title', 'value'=>set_value('title')));?>
</div>

<div class="control-group">
    <?= form_label('Cuerpo: ', 'body', array('class'=>'control-label')); ?>
    <?= form_textarea(array('type'=>'text', 'name'=>'body', 'id'=>'body', 'value'=>set_value('body')));?>
</div>

<div class="control-group">
    <?= form_textarea(array('type'=>'hidden', 'name'=>'punctuation', 'id'=>'punctuation', 'value'=>0));?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('article/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>