<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Product</h1>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= href('product', 'index') ?>"><i
                    class="fas fa-fw fa-tachometer-alt"></i></a></li>
        <li class="breadcrumb-item"><a>Create</a></li>
    </ul>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">
                <?= $this->getError('alert') ?></h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?= href('product', 'insert') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select type="text" class="form-control" name="category">
                        <?php foreach ($listCate as $item) { ?>
                        <option value="<?= $item->id ?>"><?= $item->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                </div>
                <a class="btn btn-secondary btn-md" href="<?= href('product', 'index') ?>" role="button">Back to
                    list</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</div>