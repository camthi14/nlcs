<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php } ?>

    <form action=" <?php echo _WEB_ROOT . '/product/handleUpdateProduct/' . $data['product']['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="grid-cols-12 grid gap-4">
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control " id="" placeholder="name" name="name" value="<?php echo $data['product']['name'] ?>">
            </div>
            <div class=" mb-3 col-span-6">
                <label for="" class="form-label">Select</label>
                <select name="cate_id" id="" class="custom-select" required>
                    <option>Select</option>
                    <?php foreach ($data['cates'] as $cate) { ?>
                        <option <?php echo $cate['id'] == $data['product']['cate_id'] ? 'selected' : '';
                                ?> value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?>

                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" id="" placeholder="price" name="price" value="<?php echo $data['product']['price'] ?>">
            </div>
            <div class="mb-3 col-span-12">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="description"><?php echo $data['product']['description'] ?></textarea>
            </div>

            <div class="mb-3 col-span-6">
                <label for="image" class="form-label">
                    <span>Image</span>
                    <div class="input-upload-img">
                        <img class="w-10 h-10" src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png'; ?>" alt="">
                    </div>
                </label>
                <input type="file" id="image" class="form-control hidden" onchange="readURLOneImg(this)" id="" placeholder="image" name="image">

                <div class="preview-img">
                    <?php if (!empty($data['product']['img'])) { ?>
                        <img class="img1" src="<?= _PATH_IMG_Product . $data['product']['img'] ?>" alt="">
                    <?php } ?>
                </div>
            </div>

            <div class="mb-3 col-span-6">
                <label for="image" class="form-label">
                    <span>Group Image</span>
                </label>
                <input type="file" id="image" class="form-control h-[45px]" onchange="readURLMultipleImg(this, '.preview-img-multiple')" multiple id="" placeholder="images" name="images[]">
                <div class="preview-img-multiple pt-3">
                    <?php
                    if (!empty($data['productImg'])) {
                        foreach ($data['productImg'] as $img) {
                    ?>
                            <img class="img1" src="<?= _PATH_IMG_Product . $img['img'] ?>" alt="">
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>

        <input type="hidden" name="updateproduct" value="updateproduct">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white">Update Product</button>
    </form>
</div>