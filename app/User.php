<?php

require 'Database.php';

class User
{
    private $table;
    private $fields;
    
    public function __construct(){
        $this->table = "users";
    }

    public function index($columns)
    {
        $db = new Database();
        $users = $db->select($this->table, $columns);
        unset($db);
        return $users;
    }

    public function create($name, $birth_date, $cpf, $rg, $phone)
    {
        $this->fields = array('name' => $name, 'birth_date' => $birth_date, 'cpf' => $cpf, 'rg' => $rg, 'phone' => $phone);
        $db = new Database();
        $success = $db->insert($this->table, $this->fields);
        unset($db);
        return $success;
    }

    public function show($id)
    {
        $db = new Database();
        $user = $db->show($this->table, $id);
        unset($db);
        return $user;
    }

    public function update($id,$name,$birth_date,$cpf,$rg,$phone)
    {
        $this->fields = array('id' => $id, 'name' => $name, 'birth_date' => $birth_date, 'cpf' => $cpf, 'rg' => $rg, 'phone' => $phone);
        $db = new Database();
        $success = $db->update($this->table, $this->fields);
        unset($db);
        return $success;
    }

    public function destroy($id)
    {
        $db = new Database();
        $success = $db->delete($id);
        unset($db);
        return $success;
    }
}

?>