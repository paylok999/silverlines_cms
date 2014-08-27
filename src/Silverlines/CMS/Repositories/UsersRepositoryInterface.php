<?php

namespace Silverlines\CMS\Repositories;

interface UsersRepositoryInterface
{
	public function create(array $data);
	
	public function read($id);
	
	public function update(array $data);
	
	public function delete($id);
	
	public function readAll();
}