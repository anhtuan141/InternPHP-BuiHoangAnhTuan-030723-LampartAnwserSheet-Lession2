<?php

class ProductController extends Controller
{
  public function index()
  {
    $productModel = new Product();
    //Paginate
    $pages = $productModel->_pagination();
    $currentPage = $productModel->_currentPage(get('page'));

    $list = $productModel->_listCategory($currentPage);
    $this->render('view/product/index', ['list' => $list, 'pages' => $pages]);
  }

  public function create()
  {
    $categoryModel = new Category();
    $listCate = $categoryModel->_list();
    $this->render('view/product/create', ['listCate' => $listCate]);
  }

  public function insert()
  {
    $name = post('name');
    $cate = post('category');
    $image = myUpload($_FILES['image'], 'public/uploads/products');
    $productModel = new Product();

    if (!$name) {
      $this->setError(createEmpty());
      changePage(href('product', 'create'));
    }

    if ($productModel->insert([
      'name' => $name,
      'category_id' => $cate,
      'image' => $image,
      'status' => 1
    ])) {

      $this->setError(createSuccess($name));
      changePage(href('product', 'index'));
    } else {

      $this->setError(createFail($name));
      changePage(href('product', 'index'));
    }
  }

  public function editList()
  {
    //Check ID URL
    $id = get('id');
    if (!$id) {
      changePage(href('product', 'index'));
    }
    //Check Product
    $productModel = new Product();
    $prod = $productModel->_item($id);
    if (!$prod) {
      changePage(href('product', 'index'));
    }

    $categoryModel = new Category();
    $listCate = $categoryModel->_list();
    $this->render('view/product/edit', ['prod' => $prod, 'listCate' => $listCate]);
  }

  public function updateList()
  {
    //Check ID URL
    $id = get('id');
    $prod_id = post('prod_id');
    if (!$prod_id) {
      changePage(href('product', 'index'));
    }

    $image = myUpload($_FILES['image'], 'public/uploads/products');
    $productModel = new Product();
    $prod = $productModel->_item($id);

    if ($productModel->update([
      'name' => post('name') ? trim(post('name')) : $prod->name,
      'image' => $image ?: $prod->image,
      'category_id' => post('category') ? trim(post('category')) : $prod->category_id,
    ], ['id' => $prod_id])) {

      $this->setError(updateSuccess($prod_id));
      changePage(href('product', 'editList', ['id' => $prod_id]));
    } else {

      $this->setError(updateFail($prod_id));
      changePage(href('product', 'editList', ['id' => $prod_id]));
    }
  }

  public function copy()
  {
    //Check ID URL
    $id = get('id');
    if (!$id) {
      changePage(href('product', 'index'));
    }
    //Check Product
    $productModel = new Product();
    $prod = $productModel->_item($id);
    if (!$prod) {
      changePage(href('product', 'index'));
    }

    $categoryModel = new Category();
    $listCate = $categoryModel->_list();
    $this->render('view/product/copy', ['prod' => $prod, 'listCate' => $listCate]);
  }

  public function copyInsert()
  {
    $prod_id = post('prod_id');
    if (!$prod_id) {
      changePage(href('product', 'index'));
    }

    $productModel = new Product();
    $name = post('name');
    $cate = post('category');
    $image = post('image');

    if ($productModel->insert([
      'name' => $name,
      'category_id' => $cate,
      'image' => $image,
      'status' => 1
    ])) {

      $this->setError(copySuccess($prod_id));
      changePage(href('product', 'index', ['id' => $prod_id]));
    } else {

      $this->setError(copyFail($prod_id));
      changePage(href('product', 'index', ['id' => $prod_id]));
    }
  }

  public function detail()
  {
    //Check ID URL
    $id = get('id');
    if (!$id) {
      changePage(href('product', 'index'));
    }
    //Check Product
    $productModel = new Product();
    $prod = $productModel->_item($id);
    if (!$prod) {
      changePage(href('product', 'index'));
    }

    $categoryModel = new Category();
    $listCate = $categoryModel->_list();
    $this->render('view/product/detail', ['prod' => $prod, 'listCate' => $listCate]);
  }

  public function search()
  {
    $key = "%" . post('search') . "%";

    $productModel = new Product();
    $listProduct = $productModel->_searchProduct($key);

    $categoryModel = new Category();
    $listCategory = $categoryModel->_searchCategory($key);

    $this->render('view/product/search', ['listProduct' => $listProduct, 'listCategory' => $listCategory]);
  }
}
