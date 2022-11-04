<div class="container ">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php }  ?>

    <form action=" <?php echo _WEB_ROOT . '/admin/handleAddGroup' ?>" method="post" class="">
        <div class="mb-3 ">
            <label for="" class="form-label">Name Usergroup</label>
            <input type="text" class="form-control" id="" placeholder="Admin" name="groupname">
        </div>
        <input type="hidden" name="addgroup" value="addgroup">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white" style="width: 126px; height: 40px;">Add Usergroup</button>
    </form>
    <a href="<?php echo _WEB_ROOT . '/admin/groupUser' ?>">
        <button class="btn bg-danger" style="width: 126px; height: 40px; margin-top: 20px;">Cancel</button>
    </a>

</div>