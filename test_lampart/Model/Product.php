<?php
class Product extends QueryBuilder
{
    public function __construct($table = '')
    {
        parent::__construct($table);
        $this->table = 'products';
    }

    public function _list()
    {
        return $this->select(['status', '!=', -1]);
    }

    public function _listCategory($limit)
    {
        $sql = "SELECT 
            `products`.`id`,
            `products`.`name`,
            `categories`.`name` as 'cate_name',
            `products`.`image`
            FROM `products` JOIN `categories` ON `products`.`category_id`=`categories`.`id`
            WHERE `products`.`status` != -1
            LIMIT $limit, 10 ";

        return $this->setQuery($sql)->rows([$limit]);
    }

    public function _item($id)
    {
        return $this->item(['id' => $id]);
    }

    public function _searchProduct($key)
    {
        $sql = "SELECT 
            `products`.`id` as 'id',
            `products`.`name` as 'prod_name',
            `categories`.`name` as 'cate_name',
            `products`.`image` as 'image'
                 FROM `products` JOIN `categories` ON `products`.`category_id`=`categories`.`id`
                WHERE `products`.`name` LIKE ?";
        return $this->setQuery($sql)->rows([$key]);
    }

    public function _totalPages()
    {
        $sql = "SELECT 
                COUNT(`products`.`id`) as 'number'
                FROM `products`";
        return $this->setQuery($sql)->row([]);
    }

    public function _pagination()
    {
        $result = (array)$this->_totalPages();

        $number = 0;
        if ($result != null && count($result) > 0) {
            $number = $result['number'];
        }

        return $pages = ceil($number / 10);
    }

    public function _currentPage($page)
    {
        $currentPage = 1;
        if ($page) {
            $currentPage = $page;
        }
        return $index = ($currentPage - 1) * 10;
    }
}
