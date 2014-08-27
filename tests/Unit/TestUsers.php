<?php

class Users extends PHPUnit_Framework_TestCase
{
	public $repo;
	
	public function __construct(UsersRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}
	
	public function showUser($id)
	{
		return $this->repo->read($id);
	}
	
	public function showAllUsers()
	{
		return $this->repo->readAll();
	}
	
	public function createUser(array $data)
	{
		return $this->repo->create($data);
	}
	
	public function updateUser(array $data)
	{
		return $this->repo->update($data);
	}
	
	public function deleteUser($id)
	{
		return $this->repo->delete($id);
	}
	
}