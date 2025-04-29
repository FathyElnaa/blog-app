<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
        if ($_GET['action'] == "show" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = findBlog($id);
        }
        ?>
        <div class="col-md-6">
            <div class="card shadow" style="border: none;">
                <div style="width: 100%; height: 300px; display: flex; justify-content: center; align-items: center; background-color: #f8f9fa;">
                    <img src="<?= "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $blog['image'] ?>"
                         style="max-width: 100%; max-height: 100%; object-fit: contain;" 
                         alt="blog image">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold"><?= $blog['title'] ?></h5>
                    <p class="card-text text-muted"><?= $blog['descriptions'] ?></p>
                    <div>create_at : <?= $blog['create_at'] ?? date('Y-m-d') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
