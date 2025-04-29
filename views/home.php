<?php
$blogs = get_all_blogs();
?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <?php if (!empty($blogs)): ?>
                <?php foreach ($blogs as $blog): ?>
                    <div class="post-preview mb-5">
                        <a href="post.php?id=<?= $blog['id'] ?>">
                            <div style="width: 100%; height: 300px; display: flex; justify-content: center; align-items: center; background-color: #f8f9fa;">
                                <img src="<?= "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $blog['image'] ?>"
                                     style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                     alt="blog image">
                            </div>
                            <h2 class="post-title mt-3"><?= htmlspecialchars($blog['title']) ?></h2>
                            <h5 class="post-subtitle"><?= nl2br(htmlspecialchars($blog['descriptions'])) ?></h5>
                        </a>
                        <p class="post-meta mt-2">
                            Posted by
                            <strong><?= htmlspecialchars($blog['author']) ?></strong>
                            on create_at : <?= $blog['create_at'] ?? date('Y-m-d') ?>
                        </p>
                        <a href="index.php?page=Blog-show&action=show&id=<?= $blog['id'] ?>" class="btn btn-sm btn-outline-primary">Read More</a>
                        <hr class="my-4" />
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info">No Posts Found</div>
            <?php endif; ?>

        </div>
    </div>
</div>
