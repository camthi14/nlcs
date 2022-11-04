<main>
    <div class="container">
        <div class="info_order">
            <form action="" method="post" class="">
                <div class="flex justify-end gap-2">
                    <div class="flex">
                        <input type="text" id="name_search" class="keyw_s text-sm py-3 fs-4 px-3 text-lg w-[500px] border-1 outline-0 rounded-l-lg" id="" placeholder="Search" name="keyw_s">
                        <input type="hidden" name="search" value="search">
                        <button class="w-20  flex items-center text-sm py-2 px-3 text-lg justify-center bg-[#252c30] hover:bg-slate-700 rounded-r-lg">
                            <i class="fas fa-search text-white"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="info_status border-bottom">
                <button id="change_status" class="btn_status text-uppercase" data-id="all">ALL</button>
                <?php if (isset($data['statuses'])) : ?>
                    <?php foreach ($data['statuses'] as $status) : ?>
                        <button id="change_status" class="text-uppercase" data-id='<?= $status['id'] ?>'><?= $status['name'] ?></button>
                    <?php endforeach; ?>
                <?php endif ?>
            </div>

            <table class="table table_order">
                <thead>
                    <tr>
                        <th scope="col">Bill ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Purchase</th>
                    </tr>
                </thead>
                <tbody id="show_bill">

                </tbody>
            </table>
        </div>
    </div>
</main>