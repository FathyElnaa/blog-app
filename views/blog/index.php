<?php

$blog = getblog();

?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">All Posts</h1>
        <a href="index.php?page=Blog-add&action=store" class="btn btn-primary mb-3">Add New Blog</a>
    </div>
    <?php if (!empty($blog)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($blog as $bo): ?>

                <tr>
                    <td><?= $bo['id'] ?></td>
                    <td><img width="75" src="<?= "{$_SERVER['REQUEST_SCHEME']}://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . $bo['image'] ?>"></td>
                    <td><?= $bo['title'] ?></td>
                    <td><?= $bo['descriptions'] ?></td>
                    <td>
                        <a href="index.php?page=Blog-show&action=show&id=<?= $bo['id'] ?>" class="btn btn-sm btn-info">View</a>
                        <a href="index.php?page=Blog-edit&action=edit&id=<?= $bo['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="index.php?page=Blog-delete&action=delete" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $bo['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            </tbody>
            <?php endforeach?>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No Posts Found</div>
    <?php endif ?>


</div>