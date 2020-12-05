<?php

class Database
{
	private $dsn;
	private $user;
	private $password;
	private $pdo;

	public function __construct() {
		$this->dsn = "mysql:host=localhost;dbname=user_management;charset=utf8";
		$this->user = "root";
		$this->password = "";
		
		try {
			$this->pdo = new PDO($this->dsn, $this->user, $this->password);
		} catch (PDOException $erro) {
			exit;
		}
	}

	public function select($table, $columns) {
		$sql = "SELECT ";
		$last_column = end($columns);
		foreach ($columns as $columns => $column) {
			if($column == $last_column)
				$sql .= "{$column}"; 	
			else
				$sql .= "{$column},"; 	
		}
		$sql .= " FROM {$table}";
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function verify($table, $columns, $condition) {
		$sql = "SELECT ";
		$last_column = end($columns);
		foreach ($columns as $columns => $column) {
			if($column == $last_column)
				$sql .= "{$column}"; 	
			else
				$sql .= "{$column},"; 	
		}
		$sql .= " FROM {$table} WHERE {$condition}";
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function insert($table, $fields) {
		$sql = "INSERT INTO {$table} ";
		foreach ($fields as $i => $value) {
			$sql .= "`{$i}` = {$value}"; 	
			var_dump($fields);
		}
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function show($table, $id) {
		$sql = "SELECT * FROM {$table} WHERE id = {id}";
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function update($table, $fields) {
		$sql = "UPDATE {$table} SET ";
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function delete($table, $id) {
		$sql = "DELETE FROM {$table} WHERE id = {$id}";
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return true;
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function __destruct(){
		unset($pdo);
	}
}

?>