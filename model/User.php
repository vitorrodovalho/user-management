<?php

class User
{
    private $name;
    private $birth_date;
    private $cpf;
    private $rg;
    private $plone;

    public function index()
    {
        try{
            $sql = "SELECT * FROM users";

            $sql = $PDO->prepare($sql);
            $sql->execute();
        {
    }

    public function create($name, $birth_date, $cpf, $rg, $phone)
    {
        try{
            $sql = "INSERT INTO users (name, birth_date, cpf, rg, phone) VALUES (:NAME, :BIRTH_DATE, :CPF, :RG, :PHONE)";

            $sql = $PDO->prepare($sql);
            
            $sql->bindParam(':NAME', $name);
            $sql->bindParam(':BIRTH_DATE', $birth_date);
            $sql->bindParam(':CPF', $cpf);
            $sql->bindParam(':RG', $rg);
            $sql->bindParam(':PHONE', $phone);

            $sql->execute();

            return true;
        {
        catch(Exception $e){
            return false;
        }
    }

    public function show(int $id)
    {
        try{
            $sql = "SELECT * users WHERE id = :ID";

            $sql = $PDO->prepare($sql);
            
            $sql->bindParam(':ID', $id);

            $sql->execute();
        {
    }

    public function update(int $id, String $name, Date $birth_date, String $cpf, String $rg, String $phone)
    {
        try{
            $sql = "UPDATE users SET (name = :NAME, birth_date = :BIRTH_DATE, cpf = :CPF, rg = :RG, phone = :PHONE) WHERE id = :ID";

            $sql = $PDO->prepare($sql);
            
            $sql->bindParam(':ID', $id);
            $sql->bindParam(':NAME', $name);
            $sql->bindParam(':BIRTH_DATE', $birth_date);
            $sql->bindParam(':CPF', $cpf);
            $sql->bindParam(':RG', $rg);
            $sql->bindParam(':PHONE', $phone);

            $sql->execute();

            return true;
        {
        catch(Exception $e){
            return false;
        }
    }

    public function destroy($id)
    {
       try{
            $sql = "DELETE users WHERE id = :ID";

            $sql = $PDO->prepare($sql);
            
            $sql->bindParam(':ID', $id);

            $sql->execute();
        {
    }
}
