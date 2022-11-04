<div class="container">
    <?php if (isset($data['message']) && $data['message'] != '') { ?>

        <div class="alert alert-<?php echo $data['type'] ?>">
            <?php echo $data['message'] ?>
        </div>

    <?php } ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="grid-cols-12 grid gap-4">
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control " id="" placeholder="username" name="username" value="<?php echo $data['user']['name'] ?>">
            </div>
            <div class="mb-3 col-span-6 flex items-center gap-10" id="upload-img">
                <label for="image" class="form-label">
                    <span>Avatar</span>
                    <div class="input-upload-img">
                        <img class="w-10 h-10" src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png'; ?>" alt="">
                    </div>
                </label>
                <input type="file" id="image" class="form-control hidden" id="" placeholder="Avatar" name="avatar" onchange="readURL(this);" value=" <?php echo $data['user']['avt'] ?>">

                <?php if (!empty($data['user']['avt'])) { ?>
                    <img class="img1" src="<?php echo _PATH_AVATAR . $data['user']['avt'] ?>" alt="" id="img-preview">
                <?php } ?>
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Group</label>
                <select name="groupUser" id="" class="custom-select" required>
                    <option>Select</option>

                    <?php foreach ($data['groups'] as $group) { ?>
                        <option <?php echo $group['id'] === $data['user']['group_id'] ? 'selected' : '' ?> value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                    <?php } ?>

                </select>
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="" placeholder="Email" name="email" value="<?php echo $data['user']['email'] ?>">
            </div>
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="" placeholder="Password" name="pass">
            </div>
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Conform Password</label>
                <input type="password" class="form-control" id="" placeholder="Conform Password" name="pass_cf">
            </div>

            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" id="" placeholder="Phone" name="phone" value="<?php echo $data['user']['phone'] ?>">
            </div>
            <div class="mb-3 col-span-6">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" id="" placeholder="Address" name="address" value="<?php echo $data['user']['address'] ?>">
            </div>
            <div class="mb-3 col-span-12">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." name="description"><?php echo $data['user']['description'] ?></textarea>
            </div>
        </div>

        <input type="hidden" name="updateusers" value="updateusers">
        <button type="submit" class="btn bg-[#252c30] hover:bg-slate-700 text-white">Update User</button>
    </form>

</div>