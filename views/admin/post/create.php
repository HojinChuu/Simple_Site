<h1>Create Post</h1>

<form action="<?= URLROOT ?>/admin/posts/create" method="POST">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="title" required> 
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="10" class="form-control" placeholder="content" required></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="form-control" name="tags[]" id="tags">
            <?php foreach($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>">
                    <?= $tag->name ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <input type="submit" value="Create" class="btn btn-secondary">
</form>