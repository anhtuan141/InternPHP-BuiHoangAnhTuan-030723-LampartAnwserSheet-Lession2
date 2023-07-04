<?php
class Category extends QueryBuilder
{
    public function __construct($table = '')
    {
        parent::__construct($table);
        $this->table = 'categories';
    }

    public function _list()
    {
        return $this->select(['status', '!=', -1]);
    }

    public function _item($id)
    {
        return $this->item(['id' => $id]);
    }

    public function _searchCategory($key)
    {
        $sql = "SELECT 
            `categories`.`id` as 'id',
            `products`.`name` as 'prod_name',
            `categories`.`name` as 'cate_name',
            `products`.`image` as 'image'
                 FROM `categories` JOIN `products` ON `categories`.`id` = `products`.`category_id`
                WHERE `categories`.`name` LIKE ?";
        return $this->setQuery($sql)->rows([$key]);
    }
}
