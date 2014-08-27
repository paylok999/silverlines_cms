<?php

namespace Silverlines\CMS\DataAccessObject;

use PDO;

class MySqlUsersDao implements UsersDaoInterface
{
	private $pdo;
	
	public function __construct()
	{
		try {
			$this->pdo = new PDO('mysql:host=localhost;dbname=homestead', 'root', 'secret');

		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function create(array $data)
	{
		try {
			$query = $this->pdo->prepare('
			INSERT INTO users
				(`firstname`, `lastname`, `address`, `suburb`, `postcode`, `contact`, `email`, `notes`, `username`, `password`) 
			VALUES 
				(:firstname, :lastname, :address, :suburb, :postcode, :contact, :email, :notes, :username, :password)'
			);
			$query->execute(array
				(
				':firstname' => $data['firstname'], 
				':lastname' => $data['lastname'],
				':address' => $data['address'],
				':suburb' => $data['suburb'],
				':postcode' => $data['postcode'],
				':contact' => $data['contact'],
				':email' => $data['email'],
				':notes' => $data['notes'],
				':username' => $data['username'],
				':password' => $data['password']
				)
			);
		}catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function read($id)
	{
		$query = $this->pdo->prepare('SELECT * FROM users WHERE id= :id');
		$query->execute(array(':id' => $id));
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
	
	public function update(array $data)
	{
		try {
			$query = $this->pdo->prepare('
			UPDATE users SET
				`firstname` = :firstname, 
				`lastname` = :lastname, 
				`address` = :address, 
				`suburb` = :suburb, 
				`postcode` = :postcode, 
				`contact` = :contact,
				`email`  = :email,
				`notes` = :notes,
				`username` = :username,
				`password` = :password
			WHERE id = :id'
			);
			$query->execute(array
				(
				':id' => $data['id'], 
				':firstname' => $data['firstname'], 
				':lastname' => $data['lastname'],
				':address' => $data['address'],
				':suburb' => $data['suburb'],
				':postcode' => $data['postcode'],
				':contact' => $data['contact'],
				':email' => $data['email'],
				':notes' => $data['notes'],
				':username' => $data['username'],
				':password' => $data['password']
				)
			);
		}catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function delete($id)
	{
		$query = $this->pdo->prepare('DELETE FROM users WHERE id= :id');
		$query->execute(array(':id' => $id));
	}
	
	public function readAll()
	{
		$query = $this->pdo->prepare('SELECT * FROM users');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
}