<?php

class productcontroller extends controller
{
  function index()
  {
    $model = new product();
    $list = $model->_listCategory();
    $this->render('view/product/index', ['list' => $list]);
  }

  function create()
  {
    $model = new category();
    $listCate = $model->_list();
    $this->render('view/product/create', ['listCate' => $listCate]);
  }

  function insert()
  {
    $name = post('name');
    $cate = post('category');
    $model = new product();

    if ($name) {
      if ($model->insert([
        'name' => $name,
        'category_id' => $cate,
        'status' => 1
      ])) {
        $this->set_error(createSuccess($name));
        change_page(href('product', 'index'));
      } else {
        $this->set_error(createFail($name));
        change_page(href('product', 'index'));
      }
    } else {
      $this->set_error(createEmpty());
      change_page(href('product', 'create'));
    }
  }

  function editList()
  {
    //Check ID URL
    $id = get('id');
    if (!$id) {
      change_page(href('product', 'index'));
    }
    //Check Product
    $model = new product();
    $prod = $model->_item($id);
    if (!$prod) {
      change_page(href('product', 'index'));
    }

    $model = new category();
    $listCate = $model->_list();
    $this->render('view/product/edit', ['prod' => $prod, 'listCate' => $listCate]);
  }

  function updateList()
  {
    $id = get('id');
    $prod_id = post('prod_id');

    if ($prod_id) {
      $model = new product();
      $prod = $model->_item($id);

      if ($model->update([
        'name' => post('name') ? trim(post('name')) : $prod->name,
        'image' => post('image') ? trim(post('image')) : $prod->image,
        'category_id' => post('category') ? trim(post('category')) : $prod->category_id,
      ], ['id' => $prod_id])) {
        $this->set_error(updateSuccess($prod_id));
        change_page(href('product', 'editList', ['id' => $prod_id]));
      } else {
        $this->set_error(updateFail($prod_id));
        change_page(href('product', 'editList', ['id' => $prod_id]));
      }
    } else {
      change_page(href('product', 'index'));
    }
  }

  function copy()
  {
    //Check ID URL
    $id = get('id');
    if (!$id) {
      change_page(href('product', 'index'));
    }
    //Check Product
    $model = new product();
    $prod = $model->_item($id);
    if (!$prod) {
      change_page(href('product', 'index'));
    }

    $model = new category();
    $listCate = $model->_list();
    $this->render('view/product/copy', ['prod' => $prod, 'listCate' => $listCate]);
  }

  function copyInsert()
  {
    $prod_id = post('prod_id');
    if ($prod_id) {
      $model = new product();
      $name = post('name');
      $cate = post('category');
      if ($model->insert([
        'name' => $name,
        'category_id' => $cate,
        'status' => 1
      ])) {
        $this->set_error(copySuccess($prod_id));
        change_page(href('product', 'index', ['id' => $prod_id]));
      } else {
        $this->set_error(copyFail($prod_id));
        change_page(href('product', 'index', ['id' => $prod_id]));
      }
    } else {
      change_page(href('product', 'index'));
    }
  }

  function detail()
  {
    //Check ID URL
    $id = get('id');
    if (!$id) {
      change_page(href('product', 'index'));
    }
    //Check Product
    $model = new product();
    $prod = $model->_item($id);
    if (!$prod) {
      change_page(href('product', 'index'));
    }

    $model = new category();
    $listCate = $model->_list();
    $this->render('view/product/detail', ['prod' => $prod, 'listCate' => $listCate]);
  }

  function search()
  {
    //Check ID URL
    $key = "%" . get('search') . "%";
    if (!$key) {
      change_page(href('product', 'index'));
    }

    $model = new product();
    $list = $model->_search($key);
    $this->render('view/product/search', ['list' => $list]);
  }
}
