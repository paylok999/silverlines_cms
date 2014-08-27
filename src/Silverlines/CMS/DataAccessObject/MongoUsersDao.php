<?php

namespace Silverlines\CMS\DataAccessObject;

use PDO;

class MongoUsersDao implements UsersDaoInterface
{
	private $pdo;
	
	public function __construct()
	{
		// instantiate your MongoDB connections
		return 'mongoDB connected.';
	}
	
	public function create(array $data)
	{
		//your create query
		return 'data has been created';
	}
	
	public function read($id)
	{
		//your read query
		return 'data has been read with ID';
	}
	
	public function update(array $data)
	{
		//your update query
		return 'data has been update';
	}
	
	public function delete($id)
	{
		//your delete query
		return 'data has been deleted';
	}
	
	public function readAll()
	{
		//your readall query
		return 'all data has been read';
	}
}