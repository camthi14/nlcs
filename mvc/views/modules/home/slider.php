<?php $i = 0; ?>

<section class="slider owl-carousel owl-theme ">

    <?php if (isset($data['slider'])) : ?>
        <?php foreach ($data['slider'] as $slider) : ?>
            <?php $i++ ?>

            <div class="slider-item slider-item<?= $i ?>">
                <div class="row">
                    <div class="col-12 col-lg-6 home_bg-content">
                        <h3 data-aos="fade-right" data-aos-duration="3000" class="home_bg-title"><?= htmlspecialchars($slider['title_one']) ?></h3>
                        <h3 data-aos="fade-right" data-aos-duration="3000" class="home_bg-title green"><?= htmlspecialchars($slider['title_two']) ?></h3>
                        <p data-aos="fade-left" data-aos-duration="3000" class="home_bg-sub"><?= htmlspecialchars($slider['description']) ?></p>
                    </div>
                    <div class=" col-lg-6 home_bg-img">
                        <img src=" <?= _PATH_MANAGE_IMG . $slider['image'] ?>" alt="">
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    <?php endif ?>

</section>