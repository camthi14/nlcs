<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

    <div class="alert alert-danger ?>">
        <?php echo $data['message'] ?>
    </div>

    <?php } ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Name Usergroup</label>
            <input type="text" class="form-control" id="" placeholder="Admin" name="groupname"
                value="<?php echo $data['group']['name'] ?>">
        </div>
        <input type="hidden" name="updategroup" value="updategroup">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white">Update Usergroup</button>
    </form>

</div>