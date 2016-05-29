<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<legend>Perfíl de <?= $this->session->userdata('user') ?></legend>

<?= my_validation_errors(validation_errors()); ?>

<div>
    <?php
        $avatar_path = base_url('img/avatar/' . $this->session->userdata('user_id') . '.jpg');
        if (!@getimagesize($avatar_path)):  # If image don't exists
             $avatar_path = base_url('img/avatar/0.png');
        endif;
    ?>
    <img src="<?= $avatar_path?>">
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Subir imagen" name="submit">
    </form>
    <?php
        if (isset($data['message'])){
            $message = $data['message'];
            echo "<p> $message </p>";
        }
    ?>
</div>

<div>
    <p><strong>Nombre:</strong> <?= $this->session->userdata('user') ?></p>
    <p><strong>Perfil:</strong> <?= $this->session->userdata('profile_name') ?></p>
    <?= anchor('home/change_password_form', 'Cambiar contraseña', array('class'=>'btn btn-primary')); ?>
</div>