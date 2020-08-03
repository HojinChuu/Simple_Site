<h1><?= $params['post']->title ?></h1>
<small><?= $params['post']->created_at ?></small>
<hr>
<p><?= $params['post']->content ?></p>
<a href="<?= URLROOT ?>/posts" class="btn btn-secondary">Back</a>