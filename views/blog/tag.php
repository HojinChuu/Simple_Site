<h1><?= $params['tag']->name ?></h1>

<?php foreach($params['tag']->getPosts($params['tag']->id) as $post) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <a href="<?= URLROOT; ?>/posts/<?= $post->id ?>">
                <h2><?= $post->title ?></h2>
            </a>
        </div>
    </div>
<?php endforeach ?>