<?php

require_once 'Database.php';

class Address
{
    private $table;
    private $fields;
    
    public function __construct(){
        $this->table = "user_address";
    }

    public function create($user_id, $postal_code,  $state,  $city,  $street,  $neighborhood, $number)
    {
        $this->fields = array('user_id' => $user_id, 'postal_code' => $postal_code, 'state' => $state, 'city' => $city, 'street' => $street, 'neighborhood' => $neighborhood, 'number' => $number);
        $db = new Database();
        $address_id = $db->insert($this->table, $this->fields);
        unset($db);
        return $address_id;
    }

    public function show($user_id)
    {
        $db = new Database();
        $address = $db->showByReference($this->table, "user_id = {$user_id}");
        unset($db);
        return $address;
    }

    public function delete($user_id)
    {
        $db = new Database();
        $address = $db->deleteByReference($this->table, "user_id = {$user_id}");
        unset($db);
        return $address;
    }
}

?>