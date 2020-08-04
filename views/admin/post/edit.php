<h1>edit</h1>

<form action="<?= URLROOT ?>/admin/posts/edit/<?= $params['post']->id ?>" method="POST">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?>">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="10" class="form-control"><?= $params['post']->content ?></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="form-control" name="tags[]" id="tags">
            <?php foreach($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>" 
                    <?php  
                        foreach($params['post']->getTags($params['post']->id) as $postTag) {
                            echo ($tag->id === $postTag->id) ? 'selected' : '';
                        }
                    ?>
                >
                    <?= $tag->name ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <input type="submit" value="Save" class="btn btn-secondary">
</form>