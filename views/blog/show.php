<?php var_dump($params);?>
<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach($params['post']->getTags($params['post']->id) as $tag) : ?>
        <span class="badge badge-info"><?= $tag->name ?></span>
    <?php endforeach ?>
</div>
<small><?= $params['post']->getCreatedAt() ?></small>
<hr>
<p><?= $params['post']->content ?></p>
<a href="<?= URLROOT ?>/posts" class="btn btn-secondary">Back</a>