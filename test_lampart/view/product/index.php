<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">
            <?= $this->getError('alert') ?></h5>
        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        <div class="text-right">
            <a name="" id="" class="btn btn-success btn-sm" href="<?= href('product', 'create') ?>"
                role="button">Create</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Topbar Search -->
        <div class="text-right">
            <form method="POST" action="<?= href('product', 'search') ?>"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="search"
                        placeholder="Search for..." aria-describedby="emailHelp">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
                    foreach ($list as $item) { ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->cate_name ?></td>
                        <td class="text-center"><img width="50x50" src="<?= $item->image ?>" /></td>
                        <td class="text-center">
                            <a name="" id="" class="btn btn-primary btn-sm"
                                href="<?= href('product', 'editList', ['id' => $item->id]) ?>" role="button">Edit</a>
                            <a name="" id="" class="btn btn-danger btn-sm"
                                href="<?= href('product', 'copy', ['id' => $item->id]) ?>" role="button">Copy</a>
                            <a name="" id="" class="btn btn-warning btn-sm"
                                href="<?= href('product', 'detail', ['id' => $item->id]) ?>" role="button">Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>