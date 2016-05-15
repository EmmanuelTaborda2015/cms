<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('menu_profile/insert', array('class'=>'form-horizontal')); ?>

<legend>Actualizar registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Menú: ', 'menu_id', array('class'=>'control-label')); ?>
    <?= form_dropdown('menu_id', $menus, 0); ?>
</div>

<div class="control-group">
    <?= form_label('Perfil: ', 'profile_id', array('class'=>'control-label')); ?>
    <?= form_dropdown('profile_id', $profiles, 0); ?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('menu_profile/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>