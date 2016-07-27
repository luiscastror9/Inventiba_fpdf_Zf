<?php

class Inventiba_Proxy
{
    protected $_table = null;

    public function __construct ($name, $rowClass)
    {
        $this->_table = new Inventiba_Table($name, $rowClass);
    }

    public function createRow ()
    {
        return $this->_table->createRow();
    }

    public function findById ($id)
    {
        if (isset($id)) {
            return $this->_table->findById($id);
        } else {
            return null;
        }
    }
    
    public function fetchAll()
    {
        return $this->_table->fetchAll();
    }

   public function getTable ()
    {
        return $this->_table;
    }
}