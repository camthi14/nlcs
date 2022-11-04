<main>
    <div class="gallery">
        <div class=" bg_top">
            <div class="bg_top-content ">
                <h1 class="bg_top-title">Gallery</h1>
                <div class="bg_top-info">
                    <a href="<?= _WEB_ROOT . '/' ?>" class="bg_top-link">Home</a>
                    <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                    <p class="bg_top-sub">Gallery</p>
                </div>
            </div>
        </div>
        <div class="gallery_container">
            <div class="row">
                <?php if (isset($data['blog']) && is_array($data['blog'])) : ?>
                    <?php foreach ($data['blog'] as $blog) : ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-<?= $blog['grid_layout'] ?> gallery_container-item">
                            <div class="gallery_content">
                                <a href="" class="gallery_content-link">
                                    <img src="<?= _PATH_IMG_BLOG . $blog['image'] ?>" alt="">
                                </a>
                                <div class="gallery_bg-body js_gallery-bg">
                                    <div class="gallery_content-body">
                                        <div class="body-top">
                                            <div class="body-top-left">
                                                <span class="body-date">January 02, 2022</span>
                                                <ul class="body-category">
                                                    <li class="category-item"><?= htmlspecialchars($blog['title_sub']) ?></li>
                                                </ul>
                                            </div>
                                            <div class="body-top-right">
                                                <button class="btn-item">
                                                    <span class="note">Like</span>
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                                <button class="btn-item">
                                                    <span class="note">Collect</span>
                                                    <i class="fa-solid fa-bookmark"></i>
                                                </button>
                                                <button class="btn-item">
                                                    <span class="note">Share</span>
                                                    <i class="fa-solid fa-location-arrow"></i>
                                                </button>
                                            </div>


                                        </div>
                                        <div class="body-info">
                                            <h3 class="body-title">
                                                <?= htmlspecialchars($blog['title_main']) ?>
                                            </h3>
                                            <div class="body-view">
                                                <i class="fa-solid fa-heart"></i>
                                                <span>145</span>
                                                <i class="fa-solid fa-eye"></i>
                                                <span>3,124</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
</main>