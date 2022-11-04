<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>
    <?php } ?>

    <form action=" <?php echo _WEB_ROOT . '/category/handleAddCate' ?>" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Name Category</label>
            <input type="text" class="form-control w-50" id="" placeholder="Admin" name="catename">
        </div>
        <input type="hidden" name="addcate" value="addcate">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white" style="width: 126px; height: 40px;">Add Category</button>
    </form>
    <a href="<?php echo _WEB_ROOT . '/category/listCate' ?>">
        <button class="btn bg-danger" style="width: 126px; height: 40px; margin-top: 20px;">Cancel</button>
    </a>
</div>