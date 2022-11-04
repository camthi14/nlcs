<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php } ?>

    <form action=" <?php echo _WEB_ROOT . '/blog/handleAddBlog' ?>" method="post" enctype="multipart/form-data">
        <div class="grid-cols-12 grid gap-4">
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Title Sub</label>
                <input type="text" class="form-control " id="" placeholder="title_sub" name="title_sub">
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Title Main</label>
                <input type="text" class="form-control" id="" placeholder="title_main" name="title_main">
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Interface</label>
                <input type="text" class="form-control" id="" placeholder="interface" name="interface">
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Grid_Layout</label>
                <input type="text" class="form-control" id="" placeholder="grid_Layout" name="grid_Layout">
            </div>

            <div class="mb-3 col-span-12">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="description"></textarea>
            </div>
            <div class="mb-3 col-span-6 flex items-center gap-10" id="upload-img">
                <label for="image" class="form-label">
                    <span>Avatar</span>
                    <div class="input-upload-img">
                        <img class="w-10 h-10" src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png'; ?>" alt="">
                    </div>
                </label>
                <input type="file" id="image" class="form-control hidden" id="" placeholder="image" name="image" onchange="readURL(this);">
            </div>
        </div>

        <input type="hidden" name="addBlog" value="addBlog">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white" style="width: 126px; height: 40px;">Add Blog</button>
    </form>
    <a href="<?php echo _WEB_ROOT . '/blog/listBlog' ?>">
        <button class="btn bg-danger" style="width: 126px; height: 40px; margin-top: 20px;">Cancel</button>
    </a>

</div>