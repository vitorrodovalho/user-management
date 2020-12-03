<?php

class UserController extends User 
{   
    public function __construct(){
        $this->name = $_POST['name']);
        $this->birth_date = $_POST['birth_date']);
        $this->cpf = $_POST['cpf']);
        $this->rg = $_POST['rg']);
        $this->phone = $_POST['phone']);
        $this->create();
    }

    public function __construct(){
        $this->name = $_POST['name']);
        $this->birth_date = $_POST['birth_date']);
        $this->cpf = $_POST['cpf']);
        $this->rg = $_POST['rg']);
        $this->phone = $_POST['phone']);
        $this->create();
    }

    public function edit(){
        $this->name = $_POST['name']);
        $this->birth_date = $_POST['birth_date']);
        $this->cpf = $_POST['cpf']);
        $this->rg = $_POST['rg']);
        $this->phone = $_POST['phone']);
        $this->update();
    }
}
