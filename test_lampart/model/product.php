<?php
class product extends querybuilder
{
    function __construct($table = '')
    {
        parent::__construct($table);
        $this->table = 'products';
    }

    function _list()
    {
        return $this->select(['status', '!=', -1]);
    }

    function _listCategory()
    {
        $sql = "SELECT 
            `products`.`id`,
            `products`.`name`,
            `categories`.`name` as 'cate_name',
            `products`.`image`
            FROM `products` JOIN `categories` ON `products`.`category_id`=`categories`.`id`
            WHERE `products`.`status` != -1";
        return $this->setquery($sql)->rows([]);
    }

    function _item($id)
    {
        return $this->item(['id' => $id]);
    }

    function _search($key)
    {
        $sql = "SELECT * 
            FROM `products`
            WHERE `products`.`name` LIKE '%?%'";
        return $this->setquery($sql)->rows([$key]);
    }
}
