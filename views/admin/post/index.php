<h1>Administration</h1>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($params['posts'] as $post) : ?>
            <tr>
                <th scope="row"><?= $post->id ?></th>
                <td><?= $post->title ?></td>
                <td><?= $post->getCreatedAt() ?></td>
                <td>
                    <a href="<?= URLROOT ?>/admin/posts/edit/<?= $post->id ?>" class="btn btn-outline-secondary">
                        Edit
                    </a>
                    <form action="<?= URLROOT ?>/admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline">
                        <input type="submit" value="Delete" class="btn btn-outline-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>