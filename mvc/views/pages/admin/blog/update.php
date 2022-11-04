<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php } ?>

    <?php if (isset($data['blog'])) : ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="grid-cols-12 grid gap-4">
                <div class="mb-3 col-span-6">
                    <label for="" class="form-label">Title Sub</label>
                    <input type="text" class="form-control " id="" placeholder="title_sub" name="title_sub" value="<?= $data['blog']['title_sub'] ?>">
                </div>

                <div class="mb-3 col-span-6">
                    <label for="" class="form-label">Title Main</label>
                    <input type="text" class="form-control " id="" placeholder="title_main" name="title_main" value="<?= $data['blog']['title_main'] ?>">
                </div>

                <div class="mb-3 col-span-6">
                    <label for="" class="form-label">Interface</label>
                    <input type="text" class="form-control" id="" placeholder="interface" name="interface" value="<?= $data['blog']['interface'] ?>">
                </div>

                <div class="mb-3 col-span-6">
                    <label for="" class="form-label">Grid_Layout</label>
                    <input type="text" class="form-control" id="" placeholder="grid_Layout" name="grid_Layout" value="<?= $data['blog']['grid_layout'] ?>">
                </div>

                <div class=" mb-3 col-span-12">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="description"><?= $data['blog']['description'] ?></textarea>
                </div>
                <div class="mb-3 col-span-6 flex items-center gap-10" id="upload-img">
                    <label for="image" class="form-label">
                        <span>Image</span>
                        <div class="input-upload-img">
                            <img class="w-10 h-10" src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png'; ?>" alt="">
                        </div>
                    </label>
                    <input type="file" id="image" class="form-control hidden" id="" placeholder="Image" name="image" onchange="readURL(this);" value=" <?php echo $data['blog']['image'] ?>">

                    <?php if (!empty($data['blog']['image'])) { ?>
                        <img class="img1" src="<?php echo _PATH_IMG_BLOG . $data['blog']['image'] ?>" alt="" id="img-preview">
                    <?php } ?>
                </div>
            </div>

            <input type="hidden" name="updateBlog" value="updateBlog">
            <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white" style="width: 126px; height: 40px;">Update Blog</button>
        </form>
    <?php endif ?>

</div>