<h1>News</h1>

<?php foreach($params['posts'] as $post) : ?>
    <?php var_dump($post) ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <small><?= $post->created_at ?></small>
            <hr>
            <p><?= $post->content ?></p>
            <a href="<?= URLROOT; ?>/posts/<?= $post->id ?>" class="btn btn-secondary">more</a>
        </div>
    </div>
<?php endforeach ?>