<?php
class querybuilder extends database
{
    protected $table;

    function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    function insert($data = [])
    {
        $strcolumn = $quest = '';
        $params = [];
        foreach ($data as $column => $value) {
            $strcolumn .= "`$column`,";
            $quest .= '?,';
            $params[] = trim($value);
        }
        $strcolumn = rtrim($strcolumn, ',');
        $quest = rtrim($quest, ',');
        $sql = 'INSERT INTO `' . $this->table . '` 
        (' . $strcolumn . ') 
        VALUES (' . $quest . ');';
        return $this->setquery($sql)->save($params);
    }

    function update($data = [], $where = [])
    {
        $strset = $strwhere = '';
        $params = [];
        foreach ($data as $column => $value) {
            $strset .= "`$column` = ?,";
            $params[] = trim($value);
        }
        $strset = rtrim($strset, ',');

        if ($where) {
            foreach ($where as $column => $value) {
                $strwhere .= " and `$column` = ? ";
                $params[] = trim($value);
            }
        }

        $sql = 'UPDATE `' . $this->table . '` 
        SET ' . $strset . ' 
        WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->save($params);
    }

    function delete($where = [])
    {
        $strwhere = '';
        $params = [];
        //build where đơn gian : where = và ket bằng and
        if ($where) {
            foreach ($where as $column => $value) {
                $strwhere .= " and `$column` = ? ";
                $params[] = trim($value);
            }
        }

        $sql = 'DELETE FROM `' . $this->table . '`  
        WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->save($params);
    }

    function select($where = [], $select = ['*'], $orderby = [])
    {
        $strwhere = $strselect = $strorderby = '';
        $params = [];
        //build where đơn gian : where = và ket bằng and
        if ($where) {
            if (count($where) == 3) {
                $strwhere .= " and `" . $where[0] . "` " . $where[1] . " ? ";
                $params[] = trim($where[2]);
            } else {
                foreach ($where as $column => $value) {
                    $strwhere .= " and `$column` = ? ";
                    $params[] = trim($value);
                }
            }
        }
        $strselect = implode(',', $select);
        //orderby
        if ($orderby) {
            foreach ($orderby as $column => $sort) {
                $sort = strtoupper($sort);
                $strorderby .= " `$column`  $sort,";
            }
            $strorderby = rtrim($strorderby, ',');
            $strorderby = ' ORDER BY ' . $strorderby;
        }
        $sql = 'SELECT ' . $strselect . '  
                FROM `' . $this->table . '`   
                WHERE  1=1 ' . $strwhere . $strorderby;
        return $this->setquery($sql)->rows($params);
    }

    function item($where = [], $select = ['*'])
    {
        $strwhere = $strselect = '';
        $params = [];
        if ($where) {
            foreach ($where as $column => $value) {
                $strwhere .= " and `$column` = ? ";
                $params[] = trim($value);
            }
        }
        $strselect = implode(',', $select);
        //build where đơn gian : where = và ket bằng and       
        $sql = 'SELECT ' . $strselect . '  
                FROM `' . $this->table . '`   
                WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->row($params);
    }
}
