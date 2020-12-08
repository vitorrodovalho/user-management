<?php

require_once 'Database.php';
require_once 'Session.php';

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

    public function create($name, $email, $password, $birth_date, $cpf, $rg, $phone)
    {
        //Cadastra usuário usuário no banco
        $this->fields = array('name' => $name, 'email' => $email, 'password' => $password, 'birth_date' => $birth_date, 'cpf' => $cpf, 'rg' => $rg, 'phone' => $phone);
        $db = new Database();
        $user_id = $db->insert($this->table, $this->fields);
        unset($db);
        return $user_id;
    }

    public function show($id)
    {
        $db = new Database();
        $user = $db->show($this->table, $id);
        unset($db);
        return $user;
    }

    public function update($id, $name, $email, $password, $birth_date, $cpf, $rg, $phone)
    {
        $this->fields = array('id' => $id, 'name' => $name, 'email' => $email, 'password' => $password, 'birth_date' => $birth_date, 'cpf' => $cpf, 'rg' => $rg, 'phone' => $phone);
        $db = new Database();
        $success = $db->update($this->table, $this->fields);
        unset($db);
        return $success;
    }

    public function delete($id)
    {
        $db = new Database();
        $success = $db->delete($this->table, $id);
        unset($db);
        return $success;
    }
}

?>