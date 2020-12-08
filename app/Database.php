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
		$sql = "INSERT INTO {$table} SET ";
		$count = 0;
		foreach ($fields as $column => $value) {
			$count++;
			if($count == count($fields))
				$sql .= "{$column}='{$value}'"; 
			else
				$sql .= "{$column}='{$value}', ";	
		}
		$sql = $this->pdo->prepare($sql);
		if($sql->execute())
			return $this->pdo->lastInsertId();
		else
			return false;
	}

	public function show($table, $id) {
		$sql = "SELECT * FROM {$table} WHERE id = {$id}";
		try{
			$sql = $this->pdo->prepare($sql);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function showByReference($table, $where) {
		$sql = "SELECT * FROM {$table} WHERE {$where} ORDER BY id";
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
		$count = 0;
		foreach ($fields as $column => $value) {
			$count++;
			if($column != "id"){
				if($count == count($fields))
					$sql .= "{$column}='{$value}'"; 
				else
					$sql .= "{$column}='{$value}', ";
			} 	
		}
		$sql .= " WHERE id = {$fields['id']}";
		$sql = $this->pdo->prepare($sql);
		if($sql->execute())
			return true;
		else
			return false;
	}

	public function delete($table, $id) {
		$sql = "DELETE FROM {$table} WHERE id = {$id}";
		$sql = $this->pdo->prepare($sql);
		if($sql->execute())
			return true;
		else
			return false;
	}

	public function deleteByReference($table, $where) {
		$sql = "DELETE FROM {$table} WHERE {$where}";
		$sql = $this->pdo->prepare($sql);
		if($sql->execute())
			return true;
		else
			return false;
	}

	public function __destruct(){
		unset($pdo);
	}
}

?>