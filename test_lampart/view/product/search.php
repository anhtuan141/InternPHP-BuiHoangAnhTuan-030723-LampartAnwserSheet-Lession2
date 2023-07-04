<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">
            <?= $this->getError('alert') ?></h5>
        <h6 class="m-0 font-weight-bold text-primary">Search</h6>
        <div class="text-right">
            <a name="" id="" class="btn btn-success btn-sm" href="<?= href('product', 'create') ?>" role="button">Create</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Topbar Search -->
        <div class="text-right">
            <form method="POST" action="<?= href('product', 'search') ?>" class=" d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (empty($listProduct) && empty($listCategory)) {  ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
                <div class="text-center">
                    <h5 class="m-0 font-weight-bold text-primary mb-3">Whoops, no results found.</h5>
                    <a name="" id="" class="btn btn-secondary btn-md" href="<?= href('product', 'index') ?>" role="button">Back
                        to
                        list</a>
                </div>
            </div>
        <?php  } else {
        ?>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-product-tab" data-toggle="pill" data-target="#pills-product" type="button" role="tab" aria-controls="pills-product" aria-selected="true">Products</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-category-tab" data-toggle="pill" data-target="#pills-category" type="button" role="tab" aria-controls="pills-category" aria-selected="false">Category</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
                    <?php if (empty($listProduct)) {  ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            </table>
                            <div class="text-center">
                                <h5 class="m-0 font-weight-bold text-primary mb-3">Whoops, no results found.</h5>
                                <a name="" id="" class="btn btn-secondary btn-md" href="<?= href('product', 'index') ?>" role="button">Back
                                    to
                                    list</a>
                            </div>
                        </div>
                    <?php  } else {
                    ?>
                        <h5 class="m-0 text-primary mb-3">Results: <?= count($listProduct) ?></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listProduct as $item) { ?>
                                        <tr>
                                            <td><?= $item->id ?></td>
                                            <td><?= $item->prod_name ?></td>
                                            <td><?= $item->cate_name ?></td>
                                            <td><img width="50x50" src="<?= $item->image ?>" /></td>
                                            <td class="text-center">
                                                <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('product', 'editList', ['id' => $item->id]) ?>" role="button">Edit</a>
                                                <a name="" id="" class="btn btn-danger btn-sm" href="<?= href('product', 'copy', ['id' => $item->id]) ?>" role="button">Copy</a>
                                                <a name="" id="" class="btn btn-warning btn-sm" href="<?= href('product', 'detail', ['id' => $item->id]) ?>" role="button">Detail</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-secondary btn-md" href="<?= href('product', 'index') ?>" role="button">Back
                                    to
                                    list</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="tab-pane fade" id="pills-category" role="tabpanel" aria-labelledby="pills-category-tab">
                    <div class="tab-pane fade show active" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
                        <?php if (empty($listCategory)) {  ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                </table>
                                <div class="text-center">
                                    <h5 class="m-0 font-weight-bold text-primary mb-3">Whoops, no results found.</h5>
                                    <a name="" id="" class="btn btn-secondary btn-md" href="<?= href('product', 'index') ?>" role="button">Back
                                        to
                                        list</a>
                                </div>
                            </div>
                        <?php  } else {
                        ?>
                            <h5 class="m-0 text-primary mb-3">Results: <?= count($listCategory) ?></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listCategory as $item) { ?>
                                            <tr>
                                                <td><?= $item->id ?></td>
                                                <td><?= $item->cate_name ?></td>
                                                <td><?= $item->prod_name ?></td>
                                                <td><img width="50x50" src="<?= $item->image ?>" /></td>
                                                <td class="text-center">
                                                    <a name="" id="" class="btn btn-primary btn-sm" href="<?= href('product', 'editList', ['id' => $item->id]) ?>" role="button">Edit</a>
                                                    <a name="" id="" class="btn btn-danger btn-sm" href="<?= href('product', 'copy', ['id' => $item->id]) ?>" role="button">Copy</a>
                                                    <a name="" id="" class="btn btn-warning btn-sm" href="<?= href('product', 'detail', ['id' => $item->id]) ?>" role="button">Detail</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <a name="" id="" class="btn btn-secondary btn-md" href="<?= href('product', 'index') ?>" role="button">Back
                                        to
                                        list</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php  }  ?>
    </div>