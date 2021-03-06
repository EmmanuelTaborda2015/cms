<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="hero-unit">
    <h1>Noticias recientes</h1>
    
    <?php foreach ($articles as $article): ?>
    <hr>
    <div class="pull-left">
        <?php
            $avatar_path = base_url('img/avatar/' . $article->user_id . '.jpg');
            if (!@getimagesize($avatar_path)):  # If image don't exists
                 $avatar_path = base_url('img/avatar/0.jpg');
            endif;
        ?>
        <img  class="img-circle img-responsive soft-margin" src="<?= $avatar_path?>">
        <!--<?= $article->punctuation ?>-->
    </div>
    <div class="pull-left">
        <h1 class='text-info'><?= $article->title ?></h1>
        <p>
            <i class='icon-calendar'></i>
            <?php
            if ($article->created == $article->updated):
                $date = date("d/m/Y - H:i", strtotime($article->created));
                echo "Creado el $date";
            else:
                $date = date("d/m/Y - H:i", strtotime($article->updated));
                echo "Modificado el $date";
            endif;
            ?>        
        </p>
    </div>
    <div style="clear:both;">
        <p><?= $article->body ?></p>
        <p><?= $article->author ?></p>
    </div>
    <div>
        <?php
            foreach ($comments as $comment):
                if ($comment->article_id == $article->id) {
                    $avatar_path = base_url('img/avatar/' . $article->user_id . '.jpg');
                    if (!@getimagesize($avatar_path)):  # If image don't exists
                        $avatar_path = base_url('img/avatar/0.jpg');
                    endif;
                    echo "<div style='clear:both;'>";
                    echo "<img class='img-circle img-responsive pull-left soft-margin' style='width:7%;' src=$avatar_path >";
                    echo "<p class='pull-left'><small>$comment->content</small></p>";
                    echo "</div>";
                }
            endforeach;
        ?>
    </div>
    <div style="clear:both;">
        <?= anchor('comment/direct_create/' . $article->id, "<i class='icon-comment icon-white'></i> Comentar", array('class'=>'btn btn-primary')); ?>
    </div>
    <?php endforeach; ?>

</div>