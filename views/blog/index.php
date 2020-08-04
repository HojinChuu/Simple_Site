<h1>News</h1>

<?php foreach($params['posts'] as $post) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <div>
                <?php foreach($post->getTags($post->id) as $tag) : ?>
                    <a href="<?= URLROOT; ?>/tags/<?= $tag->id ?>">
                        <span class="badge badge-info"><?= $tag->name ?></span>
                    </a>
                <?php endforeach ?>
            </div>
            <small class="text-secondary"><?= $post->getCreatedAt() ?></small>
            <hr>
            <p><?= $post->getContent() ?></p>
            <a href="<?= URLROOT; ?>/posts/<?= $post->id ?>" class="btn btn-light">more</a>
        </div>
    </div>
<?php endforeach ?>