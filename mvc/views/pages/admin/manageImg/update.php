<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') : ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php endif ?>

    <form action=" <?php echo _WEB_ROOT . '/manageImage/handleUpdateImg/' . $data['img']['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="grid-cols-12 grid gap-4">

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Page</label>
                <input type="text" class="form-control " id="" placeholder="Vd: Trang chủ" name="page" value="<?= $data['img']['page'] ?>">
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Key Image</label>
                <input type="text" class="form-control" id="" placeholder="VD: Ảnh Slide Trang chủ đặt key image là H01" name="key_image" value="<?= $data['img']['key_image'] ?>">
            </div>

            <div id="show-attribute-slider" class="col-span-12">
                <?php
                if (
                    isset($data['img']['key_image'])
                    && (strpos($data['img']['key_image'], 'slider')
                        || strpos($data['img']['key_image'], 'slider'))
                ) :
                ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Title One</label>
                        <input type="text" class="form-control " id="" placeholder="Title One" name="title_one" value="<?= $data['img']['title_one'] ?>">
                    </div>

                    <div class=" mb-3">
                        <label for="" class="form-label">Title Two</label>
                        <input type="text" class="form-control " id="" placeholder="Title Two" name="title_two" value="<?= $data['img']['title_two'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="description"><?= $data['img']['description'] ?></textarea>
                    </div>
                <?php endif ?>
            </div>

            <div class=" col-span-12">
                <label for="img" class="form-label">
                    <span>Upload One Image</span>

                    <div class="input-upload-img">
                        <img class="w-10 h-10" src="<?= _PATH_AVATAR . "image_upload.png" ?>" alt="Upload One Image">
                    </div>
                </label>
                <input type="file" id="img" class="form-control hidden" onchange="readURLOneImg(this)" placeholder="image" name="image">
            </div>

            <div class="col-span-12 mb-2">
                <div class="preview-img">
                    <?php if (isset($data['img']['image'])) : ?>
                        <img src="<?= _PATH_MANAGE_IMG . $data['img']['image'] ?>" alt="" class="img-thumbnail">
                    <?php endif ?>
                </div>
            </div>
        </div>

        <input type="hidden" name="update_img" value="update_img">

        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white mb-2">Update Image</button>
    </form>

</div>