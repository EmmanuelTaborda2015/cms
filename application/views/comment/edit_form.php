<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('comment/update', array('class'=>'form-horizontal')); ?>

<legend>Actualizar registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('ID: ', 'id', array('class'=>'control-label')); ?>
    <!--Hidden id to comment, it musn't be edited-->
    <span class="uneditable-input"> <?= $register->id; ?> </span>
    <?= form_hidden('id', $register->id);?>
</div>

<div class="control-group">
    <?= form_label('Contenido: ', 'content', array('class'=>'control-label')); ?>
    <?= form_textarea(array('type'=>'text', 'name'=>'content', 'id'=>'content', 'value'=>$register->content));?>
</div>

<div class="control-group">
    <?= form_label('Artículo: ', 'article', array('class'=>'control-label')); ?>
    <!--Hidden article field to comment, it's updated by the system-->
    <span class="uneditable-input"> <?= $register->title; ?> </span>
    <?= form_hidden('title', $register->title);?>
</div>

<div class="control-group">
    <?= form_label('Creado: ', 'created', array('class'=>'control-label')); ?>
    <!--Hidden created field to comment, it couldn't be edited-->
    <span class="uneditable-input"> <?= date("d/m/Y - H:i", strtotime($register->created)); ?> </span>
    <?= form_hidden('created', $register->created);?>
</div>

<div class="control-group">
    <?= form_label('Modificado: ', 'updated', array('class'=>'control-label')); ?>
    <!--Hidden updated field to comment, it's updated by the system-->
    <span class="uneditable-input"> <?= date("d/m/Y - H:i", strtotime($register->updated)); ?> </span>
    <?= form_hidden('updated', $register->updated);?>
</div>


<div class="control-group">
    <?= form_label('Autor: ', 'author', array('class'=>'control-label')); ?>
    <!--Hidden author field to comment, it's updated by the system-->
    <span class="uneditable-input"> <?= $register->author; ?> </span>
    <?= form_hidden('author', $register->author);?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('comment/index', 'Cancelar', array('class'=>'btn')); ?>
    <?= anchor('comment/delete/' . $register->id, 'Eliminar', array('class'=>'btn btn-warning', 'onClick'=>"return confirm('¿Está seguro que desea eliminar el campo?')")); ?>
</div>

<?= form_close(); ?>