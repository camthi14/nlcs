<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

    <div class="alert alert-<?php echo $data['type'] ?>">
        <?php echo $data['message'] ?>
    </div>

    <?php } ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Name Category</label>
            <input type="text" class="form-control w-50" id="" placeholder="Admin" name="catename"
                value="<?php echo $data['cate']['name'] ?>">
        </div>
        <input type="hidden" name="updatecate" value="updatecate">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white" >Update Category</button>
    </form>

</div>