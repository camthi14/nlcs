<main>
    <div class="container">
        <!-- <div class="row"> -->
        <div class="content_about">
            <div class="address-add">
                <h1 class="text-center mb-5 fw-bold">Change Address</h1>

                <form action="" method="post">
                    <div class="row">
                        <div class="form-group mb-5 col">
                            <label for="province" class="form-label">Province</label>
                            <small id="emailHelp" class="form-text text-danger">*</small>
                            <select id="province" class="form-control form-select form-select-lg" require>
                                <option value="" selected disabled>---Select---</option>
                            </select>
                        </div>

                        <div class="form-group mb-5 col">
                            <label for="district" class="form-label">District</label>
                            <small id="emailHelp" class="form-text text-danger">*</small>
                            <select id="district" class="form-control form-select form-select-lg" require>
                                <option value="" selected disabled>---Select---</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-5 col">
                            <label for="ward" class="form-label">Ward</label>
                            <!-- <small id="emailHelp" class="form-text text-danger">* Field is require</small> -->
                            <select id="ward" class="form-control form-select form-select-lg" require>
                                <option value="" selected disabled>---Select---</option>
                            </select>
                        </div>

                        <div class="form-group mb-5 col">
                            <label for="note" class="form-label">Note address</label>
                            <small id="emailHelp" class="form-text text-danger">* Field is require</small>
                            <textarea require id="note" class="form-control" id="note" cols="30" rows="2" placeholder="VD: 21/A Đường 3-2"></textarea>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control disabled" name="address" id="address">
                    </div>

                    <button type="submit" class="btn-custom">Save</button>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </div>
</main>