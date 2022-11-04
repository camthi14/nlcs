<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php } ?>

    <form action=" <?php echo _WEB_ROOT . '/product/handleAddProduct' ?>" method="post" enctype="multipart/form-data">
        <div class="grid-cols-12 grid gap-4">
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control " id="" placeholder="name" name="name">
            </div>
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Select</label>
                <select name="cate_id" id="" class="custom-select" required>
                    <option>Select</option>
                    <?php foreach ($data['cates'] as $cate) { ?>
                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" id="" placeholder="price" name="price">
            </div>
            <div class="mb-3 col-span-12">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="description"></textarea>
            </div>
            <div class="mb-3 col-span-6">
                <label for="image" class="form-label">
                    <span>Image</span>
                    <div class="input-upload-img">
                        <img class="w-10 h-10" src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png'; ?>" alt="">
                    </div>
                </label>
                <input type="file" id="image" class="form-control hidden" onchange="readURLOneImg(this)" id="" placeholder="image" name="image">
            </div>

            <div class="col-span-12 mb-2">
                <div class="preview-img"></div>
            </div>

            <div class="mb-3 col-span-12">
                <label for="multiple-image" class="form-label">
                    <span>Product Images</span>
                </label>
                <input type="file" id="multiple-image" class="form-control h-[45px]" onchange="readURLMultipleImg(this, '.preview-img-multiple')" multiple id="" placeholder="images" name="images[]">
            </div>

            <div class="col-span-12 mb-2">
                <div class="preview-img-multiple"></div>
            </div>
        </div>

        <input type="hidden" name="addproduct" value="addproduct">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white" style="width: 126px; height: 40px;">Add Product</button>
    </form>
    <a href="<?php echo _WEB_ROOT . '/product/listProduct' ?>">
        <button class="btn bg-danger" style="width: 126px; height: 40px; margin-top: 20px;">Cancel</button>
    </a>

</div>