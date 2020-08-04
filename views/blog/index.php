<h1>News</h1>

<?php foreach($params['posts'] as $post) : ?>
    <div class="card mb-3">
        <a href="<?= URLROOT; ?>/posts/<?= $post->id ?>" class="btn btn-light">
            <div class="card-body">
                <h2><?= $post->title ?></h2>
                <div>
                    <?php foreach($post->getTags($post->id) as $tag) : ?>
                        <span class="badge badge-info"><?= $tag->name ?></span>
                    <?php endforeach ?>
                </div>
                <small class="text-secondary"><?= $post->getCreatedAt() ?></small>
                <hr>
                <p><?= $post->getContent() ?></p>
            </div>
        </a>
    </div>
<?php endforeach ?>