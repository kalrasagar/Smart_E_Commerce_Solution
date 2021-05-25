<?php

// Use to fetch Accessory data
class Accessory
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch Accessory data using getData Method
    public function getData($table = 'accessories'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch Accessory data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get Accessory using item id
    public function getProduct($item_id = null, $table= 'accessories'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

}