<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php } ?>

    <form action=" <?php echo _WEB_ROOT . '/manageImage/handleAddImg' ?>" method="post" enctype="multipart/form-data">
        <div class="grid-cols-12 grid gap-4">

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Page</label>
                <input type="text" class="form-control " id="" placeholder="Vd: Trang chủ" name="page">
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Key Image</label>
                <input type="text" class="form-control" id="" placeholder="VD: Ảnh Slide Trang chủ đặt key image là H01" name="key_image">
            </div>

            <div id="show-attribute-slider" class="col-span-12"></div>

            <div class="mb-3 col-span-6">
                <label class="form-label">
                    Thể loại upload
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="upload_img" id="exampleRadios1" value="upload_img_one">
                    <label class="form-check-label" for="exampleRadios1">
                        Upload 1 Ảnh
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="upload_img" id="exampleRadios2" value="upload_img_multiple">
                    <label class="form-check-label" for="exampleRadios2">
                        Upload nhiểu ảnh
                    </label>
                    <small id="emailHelp" class="form-text text-danger">* Vui lòng chọn thể loại thể loại upload</small>
                </div>
            </div>

            <div id="show-type-upload" class="col-span-12"></div>

            <div class="col-span-12 mb-2">
                <div class="preview-img"></div>
            </div>
        </div>

        <input type="hidden" name="addImg" value="addImg">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white mb-2" style="width: 126px; height: 40px;">Add Image</button>
    </form>
    <a href="<?php echo _WEB_ROOT . '/manageImage/listImg' ?>">
        <button class="btn bg-danger" style="width: 126px; height: 40px; margin-top: 20px;">Cancel</button>
    </a>

</div>