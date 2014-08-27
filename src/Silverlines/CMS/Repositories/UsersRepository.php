<?php

namespace Silverlines\CMS\Repositories;

use Silverlines\CMS\DataAccessObject\UsersDaoInterface;

class UsersRepository implements UsersRepositoryInterface
{
	private $dao;
	
	public function __construct(UsersDaoInterface $dao)
	{
		$this->dao = $dao;
	}
	
	public function create(array $data)
	{
		return $this->dao->create($data);
	}
	
	public function read($id)
	{
		return $this->dao->read($id);
	}
	
	public function update(array $data)
	{
		return $this->dao->update($data);
	}
	
	public function delete($id)
	{
		return $this->dao->delete($id);
	}
	
	public function readAll()
	{
		return $this->dao->readAll();
	}
}