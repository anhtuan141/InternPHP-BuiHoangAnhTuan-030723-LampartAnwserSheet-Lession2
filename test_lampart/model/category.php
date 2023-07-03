<?php
class category extends querybuilder
{
    function __construct($table = '')
    {
        parent::__construct($table);
        $this->table = 'categories';
    }

    function _list()
    {
        return $this->select(['status', '!=', -1]);
    }

    function _item($id)
    {
        return $this->item(['id' => $id]);
    }
}
